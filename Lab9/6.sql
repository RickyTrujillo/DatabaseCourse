select p_mfgr,o_orderpriority, count(o_orderpriority) from part,partsupp, lineitem, Q5 where p_partkey=ps_partkey and ps_suppkey=l_suppkey and
l_orderkey=o_orderkey and l_partkey=p_partkey group by p_mfgr,o_orderpriority;