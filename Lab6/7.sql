select count() from (select s_name from supplier, orders, customer, lineitem where s_suppkey=l_suppkey 
and o_orderkey=l_orderkey and o_custkey=c_custkey and (c_nationkey=6 or c_nationkey=7)
group by s_name having count(distinct o_orderkey)<30);