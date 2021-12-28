SELECT L.l_receiptdate, COUNT(L.l_quantity) 
FROM lineitem L WHERE L.l_orderkey IN
(SELECT O.o_orderkey FROM orders O, customer C 
 WHERE C.c_name= 'Customer#000000118' 
 AND O.o_customerkey = C.c_custkey)
GROUP BY L.l_receiptdate;