select max(l_discount) from orders, lineitem where o_orderdate between '1995-01-01' and '1995-12-31' 
and o_orderkey = l_orderkey and l_discount < (select avg(l_discount) from lineitem);