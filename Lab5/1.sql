select count(distinct c_custkey) from customer, nation, region where n_nationkey=c_nationkey and n_regionkey=r_regionkey 
and r_name <> 'EUROPE' and r_name <> 'AFRICA'