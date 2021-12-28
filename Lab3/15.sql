SELECT n_name,strftime('%Y', o_orderdate), COUNT(o_orderkey)
FROM nation, orders, supplier, lineitem 
WHERE s_nationkey=n_nationkey 
AND o_orderkey=l_orderkey
AND l_suppkey=s_suppkey
AND o_orderpriority='3-MEDIUM'
GROUP BY n_name,strftime('%Y', o_orderdate);