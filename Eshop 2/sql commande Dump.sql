SELECT * FROM commande WHERE commande_UserID = 2;





SELECT * from commande WHERE commande_ItemsID = (SELECT Items_ID from items);


SELECT * from items;

select * from items inner join commande on commande_ItemsID = Items_ID where Commande_UserID = 3;
select * from items inner join commande on commande_ItemsID = Items_ID inner join category on Items_CategoryID = Category_ID  where Commande_UserID = 3;

DELETE FROM commande WHERE commande_ItemsID = 1 AND commande_UserID = 3;

DELETE FROM commande WHERE commande_UserID = 3;

select * from items inner join commande on commande_ItemsID = Items_ID inner join category on Items_CategoryID = Category_ID INNER JOIN user on user_Id = commande_UserID;


select Items_ID, Items_name, Items_description, count(commande_itemsID) from commande inner join items on Items_ID = commande_ItemsID inner join category on Items_CategoryID = Category_ID group by Items_ID 