select c_nation, count(o_custkey) from  Q1,orders where o_custkey=c_custkey and c_region='EUROPE' group by c_nation;

