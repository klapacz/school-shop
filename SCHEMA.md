```
user:
	id: int
	email: string
	password: string

product:
	id: int
	name: string
	price: int
	availability: int

order:
	id: int
	user_id: foreign key
	status: PENDING | PAID | SHIPPED | DELIVERED

order_product:
	id: int
	product_id: foreign key 
	order_id: foreign key 
	count: int
```
