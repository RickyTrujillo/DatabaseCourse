select count(distinct o_orderkey) from orders where o_orderkey IN
(Select distinct o_orderkey from Q2,lineitem, orders where o_orderkey=l_orderkey and s_suppkey=l_suppkey and s_region='EUROPE'
INTERSECT
SELECT distinct o_orderkey from Q1,orders where c_custkey=o_custkey and c_nation='CANADA');
