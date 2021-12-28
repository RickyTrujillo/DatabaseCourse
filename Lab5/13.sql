select distinct o_orderpriority, count(distinct o_orderkey) from orders, customer, lineitem where o_orderdate between '1996-10-01' and '1996-12-31' 
and l_orderkey=o_orderkey and o_custkey=c_custkey and l_receiptdate > l_commitdate
group by o_orderpriority order by o_orderpriority ASC;