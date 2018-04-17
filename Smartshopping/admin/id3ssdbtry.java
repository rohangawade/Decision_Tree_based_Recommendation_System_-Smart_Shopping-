import java.io.*;
import java.util.*;
import java.sql.*;
public class id3ssdbtry{
	String save="";
		File outfile;
		
		FileWriter fw;
		PrintWriter pw;
	id3ssdbtry(String tablename)throws IOException
		{
	
		outfile=new File(tablename+"decisiontree.php");
		
		if(!outfile.exists())
			{
			outfile.createNewFile();
			}
		else
			{
			outfile.delete();
			outfile.createNewFile();
			}
			
		fw=new FileWriter(outfile,true);
		pw=new PrintWriter(fw);
	pw.println("<?php \n"); 
		}
	int numAttributes;//the number of attributes including the output attribute
	String []attributeNames;//the names of all attributes.It is an array of dimension numAttributes.the last attribute is the output attribute.
	Vector []domains;/*possible values for each attribute is stored in a vector. 'domain' is an array of dimension numAttributes.
					 Each eleement of this is a vector that contains values for the corresponding attribute
					 domain[0] is a vector containg the values of 0-th attribute, etc..
					 the last attribute is the output attribute
					 */
		/*the class to represent a data point consisting of numAttributes values of the attributes*/			 
		class DataPoint {
		/*the values of all attributes stored in this array. i-th ellement in this array is the index to the element in the vector domains representing
		the symbolic value of the attribute.For example if attributes[2] is 1, then the actual value of the 2-nd attribute is ovtained by 
		domains[2].elementAt(1). this representation makes comparing values of attributes easier - it involves only integer comparison and no string comparison.
		The last attribute is the output attribute
		*/
		public int []attributes;
		public DataPoint(int numAttributes){
			attributes =new int[numAttributes];
		}
	}
	//the class to represent node in decision tree
	class TreeNode{
		public double entropy;//the entropy of data points if this node is a leaf node
		public Vector data;//the set of data points if this is a leaf node
		public int decompositionAttribute;//if this is not a leaf node,the attribute that is used to divide the set of data points
		public int decompositionValue;//if this is not a leaf node,the attribute-value that is used to divide the set of data points
		public TreeNode []children;//if this is not a leaf node references to the children nodes
		public TreeNode parent;//the parent to this node. the root has parent==null
			public TreeNode(){
				data= new Vector();
			}
	}
	
	TreeNode root= new TreeNode();//the root of the decomposition tree
	/*this funciton returns an integer corresponding to the symbolic value of the attribute.If the symbol does not exist in the domain,the symbol is added to
	the domain of the attribute
	*/
	public int getSymbolValue(int attribute,String symbol){
	
									System.out.println("-----------------------------------------------------------------------");
						System.out.println("attribute ="+attribute +"\tsymbol ="+symbol);
	int index=domains[attribute].indexOf(symbol);
								System.out.println("index ="+index);
		if(index < 0){
			domains[attribute].addElement(symbol);
								System.out.println("domain attribute"+ domains[attribute]);
			return domains[attribute].size() -1;
		}
				
		return index;
	}
	//returns all the values of the specified attribute in the data set
	public int[]getAllValues(Vector data, int attribute){
		Vector values=new Vector();
		int num=data.size();
		
									//System.out.println("getallvalues--------------------------------------------");
									//System.out.println("number of data "+ num);
		for(int i=0;i<num;i++)
		{							
									//System.out.println("getallvalues loop1-------------------------------------------------");
			DataPoint point=(DataPoint)data.elementAt(i);
			String symbol=(String)domains[attribute].elementAt(point.attributes[attribute]);
									//System.out.println("symbol "+symbol);
			int index=values.indexOf(symbol);
									//System.out.println("index ="+index);
			if(index<0){
				values.addElement(symbol);
			}
		
		}
		
		int []array=new int[values.size()];
		for(int i=0;i< array.length;i++)
		{
									//System.out.println("getallvalues loop2-------------------------------------------------------------");
			String symbol=(String)values.elementAt(i);
								//System.out.println("symbol "+symbol);
			array[i]=domains[attribute].indexOf(symbol);
								//System.out.println("domain attribute arrays"+array[i]);
		}
	
	values=null;
	return array;
	}
	//reutrns the subset of data in which the value of specied attribute of all datapoints is the specified value
	public Vector getSubset(Vector data,int attribute,int value){
		Vector subset = new Vector();
		int num=data.size();
						
									//System.out.println("getSubset()--------------------------------------------------------------------");
		for(int i=0;i<num;i++)
		{	
			DataPoint point=(DataPoint)data.elementAt(i);
			
									//System.out.println("getsubset() loop1-------------------------------------------------------------------");
									//System.out.println("point.attributes[attribute] ="+point.attributes[attribute]);
			if(point.attributes[attribute]==value)subset.addElement(point);
		}
	return subset;
	}
	//returns a subset of data,which is he complement of second argument
	public Vector getComplement(Vector data,Vector oldset)
	{
									//System.out.println("getComplement()--------------------------------------------------------------------");
	Vector subset=new Vector();
	int num=data.size();
		for(int i=0;i<num;i++)
		{
			DataPoint point =(DataPoint)data.elementAt(i);
			int index=oldset.indexOf(point);
			if(index<0)	subset.addElement(point);
		}
		return subset;
	}
	/*calculates entropy of set of datapoints.the entropy is calculated using the values of output attribute which is last element in array attributes*/
	public double calculateEntropy(Vector data)
	{
								//	System.out.println("calculateEntropy()--------------------------------------------------------------------");
	int numdata=data.size();
	if(numdata == 0) return 0;
	int attribute = numAttributes-1;
	
							//System.out.println(attribute + "attribute");//comment
    
	int	numvalues=domains[attribute].size();
							//System.out.println("numvalues ="+numvalues);
	double sum=0;
	for(int i=0;i<numvalues;i++)
		{					
						//	System.out.println("calculateEntropy() loop1--------------------------------------------------------------------");

		int count=0;
		for(int j=0;j<numdata;j++)
			{
					//		System.out.println("calculateEntropy() loop2--------------------------------------------------------------------");

			DataPoint point=(DataPoint)data.elementAt(j);
			if(point.attributes[attribute] == i) count++;
			//System.out.println(i+"\t" + j + ":" +point.attributes[attribute]);//comment
			}
		double probability=1.*count/numdata;
								//System.out.println("probability =" +probability);
		if(count>0) sum += -probability*Math.log(probability);
									//		System.out.println("sum ="+sum);}
		}
		return sum;
	}
	
	
	/*this function checks if the specified attribute and value are used to decompose the dataset in any of the parenets of the specified node in the decomposition 
	tree. Recursively checks the speccified node as well as all parents*/
	public boolean alreadyUsedToDecompose(TreeNode node,int attribute,int value)
		{
		if(node.children != null)
			{
			if(node.decompositionAttribute == attribute && node.decompositionValue == value)
				return true;
			}
		if(node.parent == null) return false;
		return alreadyUsedToDecompose(node.parent,attribute,value);
		}
	//decomposes the specified node according to the ID3 algorithm.Recursively divides all children nodes until it is not possible to divide any furhter */
	public void decomposeNode(TreeNode node)
		{
		double bestEntropy;
		boolean selected =false;
		int selectedAttribute=0;
		int selectedValue=0;
		int numdata=node.data.size();
		int numinputattributes = numAttributes-1;
		double initialEntropy = bestEntropy =node.entropy =calculateEntropy(node.data);
						//System.out.println("Entropy of "+node +"="+node.entropy);//comment
		if(node.entropy == 0) return;
		/*in the following two loops, the best attribute and value are locaatied which causes maximum decrease in entropy*/
		for(int i=0;i<numinputattributes;i++)
			{
			int numvalues=domains[i].size();
			for(int j=0;j<numvalues;j++)
				{
				if(alreadyUsedToDecompose(node,i,j)) continue;
				Vector subset=getSubset(node.data,i,j);
				if(subset.size()==0) continue;
				Vector complement=getComplement(node.data,subset);
				double e1 =calculateEntropy(subset);
				double e2=calculateEntropy(complement);
			double entropy=(e1 * subset.size() + e2* complement.size())/numdata;
				if(entropy<bestEntropy)
					{
					selected =true;
					bestEntropy=entropy;
					selectedAttribute=i;
					selectedValue=j;
					}
				}
			}
			if(selected ==false) return;
			//now divide the data set into two using the selected attribute and value
			node.decompositionAttribute=selectedAttribute;
			node.decompositionValue=selectedValue;
			node.children =new TreeNode[2];
			node.children[0]=new TreeNode();
			node.children[0].parent=node;
			node.children[0].data=getSubset(node.data,selectedAttribute,selectedValue);
			node.children[1]=new TreeNode();
			node.children[1].parent=node;
		//this loop copies all the data that are not in the first child node into the second child node
			for(int j=0;j<numdata;j++)
				{
				DataPoint point=(DataPoint)node.data.elementAt(j);
				if(node.children[0].data.indexOf(point)>=0)continue;
				node.children[1].data.addElement(point);
				}
							//System.out.println("Divided" +node+"with"+node.data.size()+"data,on attribute" +selectedAttribute +"=="+selectedValue);//comment
		//Recursively divides children node
		decomposeNode(node.children[0]);
		decomposeNode(node.children[1]);
		node.data =null;//release the memory since no more need of vector.
		}
		/*function to read the data. the first line of the data file should contain the names of all attributes. the number of attributes is inferred from the 
		number of words in this line.The last word is taken as the name of the output attribute. Each subsequent line contains the value of attributes for a 
		data point.if any line starts with // it is taken as a comment and ignored. Blank lines are also ignoredsss*/
public int readData(String dname,String tname)
	{
	System.out.println("--------Read data--------");
			System.out.println("See Description of Table Example!");
  Connection con = null;
 // int i=0;
  //String col_name[];
  try
  {
  Class.forName("com.mysql.jdbc.Driver");
  
  String connectstring="jdbc:mysql://localhost:3306/"+dname;
  con = DriverManager.getConnection(connectstring,"root","");
  
  Statement st = con.createStatement();
  //BufferedReader bf = new BufferedReader(new InputStreamReader(System.in));
  //System.out.println("Enter table name:");
  //String table = bf.readLine();
  ResultSet rs = st.executeQuery("SELECT * FROM "+tname);
  ResultSetMetaData md = rs.getMetaData();
  numAttributes = md.getColumnCount();
  System.out.println("column count ="+numAttributes);
 if(numAttributes<=1)
				{
			//	System.err.println("Read line:"+input);
				System.err.println("Could not obtain the names of attributes in the line");
				System.err.println("Expecting at least one input attribute and one output attribute");
				return 0;
				}
			
			domains=new Vector[numAttributes];
			for(int i=0;i<numAttributes;i++) domains[i]=new Vector();
			attributeNames=new String[numAttributes];
	
	for(int i=1;i<=numAttributes;i++)
				{
			//	System.out.println("in loop");
			String col_name = md.getColumnName(i);
					//System.out.print(col_name+"\t");
					attributeNames[i-1]=col_name;
						System.out.println("attributeName = "+attributeNames[i-1]);
				}
			while(rs.next())
				{
				
				//tokenizer=new StringTokenizer(input);
				//int numtokens=tokenizer.countTokens();
							
					//	System.out.println("numtokens = "+numtokens);
				/*if(numtokens!=numAttributes)
					{
					System.err.println("Read" +root.data.size()+"Data");
					System.err.println("last line read :"+input);
					System.err.println("expecting "+numAttributes +"attributes");
					return 0;
					}*/
				DataPoint point=new DataPoint(numAttributes);
				for(int i=0;i<numAttributes;i++)
					{
					point.attributes[i]=getSymbolValue(i,rs.getString(i+1));
					System.out.println("point.attributes["+i+"]="+point.attributes[i]);
					}
				root.data.addElement(point);	
				}
		/*	bin.close();*/
con.close();	
	}
			catch(SQLException se)
			{
			System.out.println("sql code could nt execute");
			}
			catch(Exception e)
				{
				e.printStackTrace();
				}
			return 1;	
			
	}
	/*this funcntion prints decision tree*/		
	public void printTree(TreeNode node,String tab) throws Exception
		{
	
	
		int outputattr=numAttributes-1;
		if(node.children==null)
			{
			int []values=getAllValues(node.data,outputattr);
			if(values.length==1)
				{
		//		System.out.println(tab+"\t"+attributeNames[outputattr]+"=\""+domains[outputattr].elementAt(values[0])+"\";");
		//pw.write(tab+"\t"+attributeNames[outputattr]+"=\""+domains[outputattr].elementAt(values[0])+"\";");
			save=tab+"\t$"+attributeNames[outputattr]+"=\""+domains[outputattr].elementAt(values[0])+"\";";
			System.out.println(save);
			pw.println(save);
				return;
				}
				//pw.newLine();
				//System.out.println(tab+"\t"+attributeNames[outputattr]+"={");
				//pw.println(tab+"\t"+attributeNames[outputattr]+"={");
				save=tab+"\t$"+attributeNames[outputattr]+"=";
			System.out.println(save);
				pw.print(save);
				for(int i=0;i<1;i++)
					{
				//	System.out.println("\""+domains[outputattr].elementAt(values[i])+"\" ");
					//pw.newLine();
					//pw.println("\""+domains[outputattr].elementAt(values[i])+"\" ");
					save="\""+domains[outputattr].elementAt(values[i])+"\";";
				System.out.println(save);
					pw.println(save);
					//if(i!=values.length-1) {System.out.print(",");pw.print(",");} 
					}
					//pw.newLine();
					//pw.println("};");
				//System.out.println("};");
			/*	save=tab+"\t$"+attributeNames[outputattr]+"={";
			System.out.println(save);
				pw.println(save);
				for(int i=0;i<values.length;i++)
					{
				//	System.out.println("\""+domains[outputattr].elementAt(values[i])+"\" ");
					//pw.newLine();
					//pw.println("\""+domains[outputattr].elementAt(values[i])+"\" ");
					save="\""+domains[outputattr].elementAt(values[i])+"\" ";
				System.out.println(save);
					pw.println(save);
					if(i!=values.length-1) {System.out.print(",");pw.print(",");} 
					}
					//pw.newLine();
					pw.println("};");
				System.out.println("};");	*/
				return;
			}
	//	System.out.println(tab+"if("+attributeNames[node.decompositionAttribute]+"==\""+domains[node.decompositionAttribute].elementAt(node.decompositionValue)+"\"){");
	//	pw.newLine();
		//pw.println(tab+"if("+attributeNames[node.decompositionAttribute]+"==\""+domains[node.decompositionAttribute].elementAt(node.decompositionValue)+"\"){");
		save=tab+"if($"+attributeNames[node.decompositionAttribute]+"==\""+domains[node.decompositionAttribute].elementAt(node.decompositionValue)+"\"){";
		System.out.println(save);
		pw.println(save);
		printTree(node.children[0],tab +"\t");
		System.out.println(tab+"}else {");
		//pw.newLine();
		pw.println(tab+"}else {");
		printTree(node.children[1],tab +"\t");
		System.out.println(tab+"}");
		//pw.newLine();
		pw.println(tab+"}");
		//pw.close();
		}
	//creating decision tree
	public void createDecisionTree()throws Exception
		{
		decomposeNode(root);
		printTree(root,"");
		pw.print("?>");
		pw.close();
		}
	//Main function
	public static void main(String[] args)throws Exception
		{
		String dbname=args[0];
		String tablename=args[1];
		id3ssdbtry me=new id3ssdbtry(tablename);
		
		int status=me.readData(dbname,tablename);
		if(status<=0)
		return;
		else
		me.createDecisionTree();

		}
}