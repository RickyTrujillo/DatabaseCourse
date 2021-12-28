create trigger t1 after insert on orders

begin 
	update orders set o_orderdate = DATEtime('NOW','+1 day') where o_orderkey= NEW.o_orderkey;
end; 

insert into orders select * from orders where o_orderdate like '1996-08%';
select * from orders where o_orderdate like strftime('%Y-%m-%d');