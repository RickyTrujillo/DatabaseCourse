select n_name, 
    ((select sum(l_extendedprice) from lineitem, nation n2, supplier, customer, orders where s_nationkey=n1.n_nationkey and l_suppkey=s_suppkey 
      and n2.n_nationkey != n1.n_nationkey  and n2.n_nationkey=c_nationkey and o_custkey=c_custkey and l_orderkey=o_orderkey and l_shipdate like '1996%') 
      -
      (select sum(l_extendedprice) from lineitem, nation n2, supplier, customer, orders where s_nationkey=n2.n_nationkey and l_suppkey=s_suppkey 
      and n2.n_nationkey != n1.n_nationkey  and n1.n_nationkey=c_nationkey and o_custkey=c_custkey and l_orderkey=o_orderkey and l_shipdate like '1996%'))
from nation n1
group by n_name;