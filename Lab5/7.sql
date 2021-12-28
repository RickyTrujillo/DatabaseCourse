select o_orderpriority, count() from orders, part, lineitem where l_orderkey= o_orderkey and l_receiptdate< l_commitdate 
and l_partkey=p_partkey and o_orderdate like '1996%' group by o_orderpriority;