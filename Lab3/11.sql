SELECT COUNT(DISTINCT c_name) FROM customer WHERE c_custkey IN
(SELECT o_custkey FROM orders WHERE o_orderkey IN
(SELECT l_orderkey FROM lineitem WHERE l_discount>=0.04));