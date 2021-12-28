select sum(l_extendedprice*(1-l_discount))/(select sum(l_extendedprice*(1-l_discount)) 
    from nation n1, nation n2, region, orders,lineitem, supplier, customer
    where s_suppkey=l_suppkey and l_orderkey=o_orderkey and o_custkey=c_custkey and c_nationkey=n2.n_nationkey and n2.n_regionkey=r_regionkey and n1.n_nationkey=s_nationkey 
    and l_shipdate like '1996%' and r_name='EUROPE') 
from nation n3, nation n4, region, lineitem, orders, customer, supplier
    where s_suppkey=l_suppkey and l_orderkey=o_orderkey and o_custkey=c_custkey and c_nationkey=n4.n_nationkey and n4.n_regionkey=r_regionkey and n3.n_nationkey=s_nationkey 
    and l_shipdate like '1996%' and n3.n_name='UNITED STATES' and r_name='EUROPE';