select round(sum(ps_supplycost),2) from part, partsupp where ps_partkey in 
(select l_partkey from lineitem where l_shipdate like '1996%') and ps_suppkey not in
(select s_suppkey from lineitem, supplier where l_suppkey=s_suppkey and l_shipdate like '1995%' and l_extendedprice<1000)
and p_partkey=ps_partkey and p_retailprice<1000; 