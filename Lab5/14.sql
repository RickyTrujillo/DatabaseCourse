select r1.r_name, r2.r_name, strftime('%Y',l_shipdate) as year, round(sum(l_extendedprice*(1-l_discount)),4) 
from nation n1, nation n2, region r1, region r2, lineitem,orders, customer, supplier where o_orderkey=l_orderkey and l_suppkey=s_suppkey
and o_custkey=c_custkey and n1.n_nationkey=s_nationkey and n1.n_regionkey=r1.r_regionkey and n2.n_nationkey=c_nationkey and 
n2.n_regionkey=r2.r_regionkey and l_shipdate between '1995-01-01' and '1996-12-31'
group by r1.r_name, r2.r_name, year
order by r1.r_name, r2.r_name, l_shipdate;