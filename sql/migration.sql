CREATE TABLE mycms.tb_blog_post(
    id 				INTEGER AUTO_INCREMENT PRIMARY KEY,
    title 			VARCHAR(512) NOT NULL,
    content         TEXT NOT NULL,
    preview_content	VARCHAR(1024)
);

INSERT INTO mycms.tb_blog_post (title, content, preview_content)
	VALUES('Последни клюки', 
		   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tempus iaculis condimentum. Aliquam vulputate pretium mauris a convallis. 
			Cras faucibus odio quis nibh condimentum, id iaculis neque fermentum. Ut et elit tortor. In hac habitasse platea dictumst. Morbi 
			egestas nec massa in elementum. Nulla a ipsum semper, varius nulla eget, tincidunt dui. Vivamus venenatis purus augue, non consectetur 
			risus ornare ac. Nam dictum aliquam tellus in interdum. Proin purus est, tincidunt ac dui ac, euismod tempor nibh. Nullam sit amet 
			tempor justo. Integer tempus turpis in magna tincidunt pellentesque ac in nisi. Nunc viverra nunc ut maximus consequat.',
            'Това са най последните клюки на света');
            
INSERT INTO mycms.tb_blog_post (title, content, preview_content)
	VALUES('Политика служба тика', 
		   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tempus iaculis condimentum. Aliquam vulputate pretium mauris a convallis. 
			Cras faucibus odio quis nibh condimentum, id iaculis neque fermentum. Ut et elit tortor. In hac habitasse platea dictumst. Morbi 
			egestas nec massa in elementum. Nulla a ipsum semper, varius nulla eget, tincidunt dui. Vivamus venenatis purus augue, non consectetur 
			risus ornare ac. Nam dictum aliquam tellus in interdum. Proin purus est, tincidunt ac dui ac, euismod tempor nibh. Nullam sit amet 
			tempor justo. Integer tempus turpis in magna tincidunt pellentesque ac in nisi. Nunc viverra nunc ut maximus consequat.',
            'Политиката е като .......');
            
INSERT INTO mycms.tb_blog_post (title, content, preview_content)
	VALUES('Сашо Роман президент', 
		   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tempus iaculis condimentum. Aliquam vulputate pretium mauris a convallis. 
			Cras faucibus odio quis nibh condimentum, id iaculis neque fermentum. Ut et elit tortor. In hac habitasse platea dictumst. Morbi 
			egestas nec massa in elementum. Nulla a ipsum semper, varius nulla eget, tincidunt dui. Vivamus venenatis purus augue, non consectetur 
			risus ornare ac. Nam dictum aliquam tellus in interdum. Proin purus est, tincidunt ac dui ac, euismod tempor nibh. Nullam sit amet 
			tempor justo. Integer tempus turpis in magna tincidunt pellentesque ac in nisi. Nunc viverra nunc ut maximus consequat.',
            'Бъдещето е света, еее тра ла ла');
            
INSERT INTO mycms.tb_blog_post (title, content, preview_content)
	VALUES('Излезе HTML8', 
		   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tempus iaculis condimentum. Aliquam vulputate pretium mauris a convallis. 
			Cras faucibus odio quis nibh condimentum, id iaculis neque fermentum. Ut et elit tortor. In hac habitasse platea dictumst. Morbi 
			egestas nec massa in elementum. Nulla a ipsum semper, varius nulla eget, tincidunt dui. Vivamus venenatis purus augue, non consectetur 
			risus ornare ac. Nam dictum aliquam tellus in interdum. Proin purus est, tincidunt ac dui ac, euismod tempor nibh. Nullam sit amet 
			tempor justo. Integer tempus turpis in magna tincidunt pellentesque ac in nisi. Nunc viverra nunc ut maximus consequat.',
            'Невероятно, но факт');

INSERT INTO mycms.tb_blog_post (title, content, preview_content)
	VALUES('Започнахме да пишем бази', 
		   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tempus iaculis condimentum. Aliquam vulputate pretium mauris a convallis. 
			Cras faucibus odio quis nibh condimentum, id iaculis neque fermentum. Ut et elit tortor. In hac habitasse platea dictumst. Morbi 
			egestas nec massa in elementum. Nulla a ipsum semper, varius nulla eget, tincidunt dui. Vivamus venenatis purus augue, non consectetur 
			risus ornare ac. Nam dictum aliquam tellus in interdum. Proin purus est, tincidunt ac dui ac, euismod tempor nibh. Nullam sit amet 
			tempor justo. Integer tempus turpis in magna tincidunt pellentesque ac in nisi. Nunc viverra nunc ut maximus consequat.',
            'Ами, започнахме');