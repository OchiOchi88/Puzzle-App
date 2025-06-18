show databases;

use puzzle_db;

show columns from users;

select *
from users;

select user_items.id     AS id,
       users.name        AS user_name,
       items.name        AS item_name,
       user_items.amount AS amount
from user_items
         inner join users on users.id = user_items.user_id
         inner join items on items.id = user_items.item_id;

select *
from items
where name = :name
  and type = :type
  and value = :value
  and text = :text;
