select c_name, count() from Q1,Q5 where o_custkey=c_custkey and c_nation='GERMANY' and o_orderyear='1995' group by c_name;

