select count(distinct O.o_custkey) from orders O, (select(o_custkey) from orders where o_orderdate between '1995-08-01' and '1995-08-31' 
group by o_custkey having count(o_orderkey)<=2)q1 where q1.o_custkey=O.o_custkey;