SELECT R.r_name, COUNT(O.o_orderstatus) from region R, orders O, nation N, customer C
WHERE O.o_custkey=C.c_custkey AND C.c_nationkey=N.n_nationkey AND N.n_regionkey = R.r_regionkey
AND O.o_orderstatus = 'F'
GROUP BY R.r_name
ORDER BY COUNT(O.o_orderstatus) DESC;