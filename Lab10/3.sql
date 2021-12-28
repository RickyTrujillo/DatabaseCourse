create trigger t4 after delete on lineitem for each row when (OLD.l_orderkey in (select o_orderkey from orders))
begin
	update orders set o_orderpriority='HIGH' where o_orderkey=OLD.l_orderkey;
end; 

create trigger t5 after insert on lineitem for each row when (NEW.l_orderkey in (select o_orderkey from orders))
begin
	update orders set o_orderpriority='HIGH' where o_orderkey=OLD.l_orderkey;
end;

delete from lineitem where l_orderkey in (select o_orderkey from orders where o_orderdate like '1995-08%');

select count() from orders where o_orderpriority like 'HIGH' and o_orderdate between '1995-08-01' and '1995-08-31';