CREATE TABLE music_shop.Category
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(30) NOT NULL,
    description longtext,
    parent_id int(11),
    CONSTRAINT id_parent_id_fk FOREIGN KEY (parent_id) REFERENCES music_shop.Category (id)
);
CREATE UNIQUE INDEX Category_id_uindex ON music_shop.Category (id);
CREATE INDEX id_parent_id_fk ON music_shop.Category (parent_id);
INSERT INTO music_shop.Category (id, name, description, parent_id) VALUES (1, 'Disques', 'Maecenas malesuada venenatis augue non posuere. Nunc non auctor elit. Vivamus varius massa quis nisl lobortis volutpat. In fermentum metus a lorem convallis placerat. Etiam et orci quam. Aliquam finibus sed sem sit amet scelerisque. Maecenas sollicitudin interdum mi, pretium fermentum nibh tincidunt nec. Praesent maximus placerat dui eu dignissim.', null);
INSERT INTO music_shop.Category (id, name, description, parent_id) VALUES (2, 'Instrument', 'Curabitur ut quam quis lorem rutrum rhoncus quis at dui. Vestibulum congue vestibulum aliquam. Integer tempor tempor consectetur. Sed a bibendum elit, tristique porttitor eros. Morbi dignissim dolor ac arcu pretium egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec metus sed ligula euismod scelerisque sed imperdiet sem. Donec venenatis placerat est vitae varius. Nullam quis odio luctus, porttitor lectus vitae, maximus sapien.

', null);
INSERT INTO music_shop.Category (id, name, description, parent_id) VALUES (3, 'Guitar', 'Fusce venenatis suscipit nunc, placerat tincidunt felis. Suspendisse nec porta nunc. Fusce luctus orci vel quam malesuada, tristique ultricies dolor volutpat. Nulla suscipit ultrices luctus. Donec quis arcu quis ante bibendum cursus. Nulla tempor dapibus libero vitae blandit. Maecenas sit amet semper diam. Fusce venenatis fermentum neque ut congue. Cras eget porttitor augue. Pellentesque laoreet ante lectus, ut ultrices purus varius volutpat.', 2);
INSERT INTO music_shop.Category (id, name, description, parent_id) VALUES (4, 'Piano', 'Sed arcu ipsum, venenatis quis laoreet quis, lobortis ut arcu. Curabitur rutrum erat id sem venenatis volutpat. Pellentesque tempus tellus a lobortis feugiat. Nunc consequat risus et elit scelerisque volutpat. Vestibulum mattis ligula tortor, non tempor nisl rutrum vel. Fusce aliquet rutrum iaculis. Vivamus venenatis laoreet mi a fringilla. Vivamus fermentum arcu mi, at congue mi euismod sit amet. Pellentesque at rutrum elit. Cras vehicula a dolor sed ornare.', 2);
CREATE TABLE music_shop.CategoryProduct
(
    product_id int(11) NOT NULL,
    category_id int(11) NOT NULL,
    CONSTRAINT product_id_fk FOREIGN KEY (product_id) REFERENCES music_shop.Product (id),
    CONSTRAINT CategoryProduct_Category_id_fk FOREIGN KEY (category_id) REFERENCES music_shop.Category (id)
);
CREATE INDEX product_id_fk ON music_shop.CategoryProduct (product_id);
CREATE INDEX CategoryProduct_Category_id_fk ON music_shop.CategoryProduct (category_id);
INSERT INTO music_shop.CategoryProduct (product_id, category_id) VALUES (9, 1);
INSERT INTO music_shop.CategoryProduct (product_id, category_id) VALUES (10, 1);
INSERT INTO music_shop.CategoryProduct (product_id, category_id) VALUES (11, 1);
INSERT INTO music_shop.CategoryProduct (product_id, category_id) VALUES (12, 1);
INSERT INTO music_shop.CategoryProduct (product_id, category_id) VALUES (13, 1);
INSERT INTO music_shop.CategoryProduct (product_id, category_id) VALUES (2, 3);
INSERT INTO music_shop.CategoryProduct (product_id, category_id) VALUES (3, 3);
INSERT INTO music_shop.CategoryProduct (product_id, category_id) VALUES (4, 3);
INSERT INTO music_shop.CategoryProduct (product_id, category_id) VALUES (5, 4);
INSERT INTO music_shop.CategoryProduct (product_id, category_id) VALUES (6, 4);
INSERT INTO music_shop.CategoryProduct (product_id, category_id) VALUES (7, 4);
CREATE TABLE music_shop.Product
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    description longtext,
    price float NOT NULL,
    type enum('guitar', 'piano', 'disc'),
    numberOfStrings int(11),
    numberOfKeys int(11),
    color varchar(30)
);
CREATE UNIQUE INDEX Product_id_uindex ON music_shop.Product (id);
INSERT INTO music_shop.Product (id, name, description, price, type, numberOfStrings, numberOfKeys, color) VALUES (2, 'Fender Stratocaster', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet lorem tristique, mollis sapien id, venenatis odio. Cras pellentesque tristique luctus. Praesent fringilla, est gravida finibus finibus, lorem diam consequat ex, id luctus augue nisi dignissim ante. Duis nisl lorem, rhoncus in arcu non, hendrerit laoreet lectus. Nam quis ullamcorper libero. Nunc semper odio ut semper feugiat. Nulla ut tristique nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam at dictum lectus. Duis a maximus mauris, sed vulputate lectus. Suspendisse a imperdiet mauris. Phasellus nec aliquam sapien, sit amet porttitor tortor.', 529.99, 'guitar', 6, null, 'Bleu');
INSERT INTO music_shop.Product (id, name, description, price, type, numberOfStrings, numberOfKeys, color) VALUES (3, 'Gibson Les Paul', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut ac finibus sem. Quisque est purus, tincidunt a ultrices ac, pulvinar at urna. In scelerisque dolor massa, at laoreet dui tincidunt non. Sed at dolor nec libero rhoncus sollicitudin vitae quis turpis. Pellentesque ligula nisi, consequat quis suscipit vitae, viverra et elit. Nunc auctor magna nec quam venenatis, dignissim aliquam elit volutpat. Sed quis elit sit amet felis pharetra imperdiet vel quis libero. Praesent imperdiet mattis tempor. Vivamus nunc magna, sollicitudin sed ligula a, ultrices ultrices magna.', 1258.75, 'guitar', 6, null, 'Rouge');
INSERT INTO music_shop.Product (id, name, description, price, type, numberOfStrings, numberOfKeys, color) VALUES (4, 'Ibanez JEM7V', 'Donec tempor elit augue, ac rhoncus odio scelerisque vitae. Proin condimentum orci eu metus mattis congue. Pellentesque sagittis quam ex, nec lacinia eros egestas non. Vivamus imperdiet elementum metus a pretium. Maecenas eget nisl sed augue consectetur tristique non non metus. Curabitur metus arcu, scelerisque eget efficitur in, bibendum ut lectus. Aenean velit libero, ultrices eu nunc vel, rutrum vehicula erat.

', 2499.99, 'guitar', 6, null, 'Noir');
INSERT INTO music_shop.Product (id, name, description, price, type, numberOfStrings, numberOfKeys, color) VALUES (5, 'Grand Piano', 'Donec ligula ligula, auctor aliquam consequat in, bibendum bibendum est. Mauris eu sapien ut leo efficitur porttitor. Maecenas convallis dui ac nunc efficitur, sed accumsan ante faucibus. Morbi tristique magna massa, at facilisis sapien consequat ut. Praesent accumsan, libero a vestibulum faucibus, lectus justo posuere velit, vel pharetra sapien tortor egestas turpis. Ut efficitur quam at dui elementum, nec vulputate est blandit. Vivamus egestas vulputate erat eget pharetra. Praesent ut massa mi. Nulla facilisi. Proin placerat elit dictum leo rhoncus, id laoreet risus pharetra. Donec luctus orci nec ligula pretium, eget vulputate dolor laoreet. Praesent ac fermentum tellus. Nullam bibendum leo eget nisi tempus, sed fringilla est posuere.', 4999.99, 'piano', null, 88, null);
INSERT INTO music_shop.Product (id, name, description, price, type, numberOfStrings, numberOfKeys, color) VALUES (6, 'Piano droit', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis finibus sapien lacus. Integer magna magna, vestibulum in ex eu, feugiat eleifend risus. Duis sed tellus sodales magna eleifend rutrum eu ac massa. Nulla bibendum at erat ac semper. Donec luctus felis ut ante condimentum, sit amet posuere risus condimentum. Sed eu velit euismod, vulputate eros non, imperdiet eros. Suspendisse augue metus, semper ac suscipit non, bibendum id lorem. Phasellus gravida tellus a dictum aliquam.', 1439.5, 'piano', null, 88, null);
INSERT INTO music_shop.Product (id, name, description, price, type, numberOfStrings, numberOfKeys, color) VALUES (7, 'Synthétiseur', 'Donec ut pretium erat, sed aliquet leo. Nullam quam dui, varius a lorem non, scelerisque maximus dui. Mauris tempus quis dui eget hendrerit. Vivamus ultrices in ligula id finibus. Etiam vel vestibulum massa, ac faucibus odio. Cras convallis, purus vel ultrices luctus, ligula nulla pellentesque erat, ut semper diam lorem eget dui. Praesent vehicula euismod elementum. Sed finibus odio ante, quis egestas orci viverra id. Donec pulvinar urna sit amet felis egestas semper. Aliquam interdum fringilla purus, non pellentesque turpis posuere id. In molestie sagittis turpis in luctus.', 199.99, 'piano', null, 49, null);
INSERT INTO music_shop.Product (id, name, description, price, type, numberOfStrings, numberOfKeys, color) VALUES (8, 'JS Bach', 'Nulla tincidunt maximus elit ut tincidunt. Maecenas leo nisi, imperdiet in dignissim at, consectetur eget tortor. In ultrices nisi risus, id rutrum metus gravida ac. Suspendisse sit amet ex ultrices, dictum nunc quis, feugiat velit. Maecenas sit amet odio augue. Phasellus vel aliquam metus, vitae dignissim mauris. Sed eget tempor ante. Nullam fringilla, mauris sit amet fringilla blandit, nisl purus finibus metus, vel dignissim tellus quam quis purus. Duis nunc tellus, bibendum eu felis et, rutrum finibus nisl. Integer accumsan rhoncus venenatis. Proin eu porttitor nulla.', 18.99, 'disc', null, null, null);
INSERT INTO music_shop.Product (id, name, description, price, type, numberOfStrings, numberOfKeys, color) VALUES (9, 'Pink FLoyd - Dark Side of the moon', 'Donec tincidunt gravida orci, at egestas libero tincidunt sed. Suspendisse tincidunt ultrices auctor. In vel convallis libero. Mauris aliquet, lectus eu ultrices efficitur, neque metus pharetra tortor, sit amet euismod orci mauris ut orci. Cras vehicula turpis commodo tellus molestie cursus. Etiam hendrerit nisi non libero commodo porttitor. Donec in erat mi. Cras congue sagittis finibus. Nulla ullamcorper pharetra eleifend. Suspendisse augue dolor, cursus elementum posuere eget, gravida sed libero. Praesent ac ornare dolor. Duis imperdiet, dui vel tincidunt condimentum, eros urna dignissim libero, vitae pulvinar libero eros ut mi. Sed sollicitudin, diam vitae congue varius, nisl lacus gravida massa, nec sodales dolor orci ut augue. Suspendisse potenti. Quisque mattis sit amet est et aliquet.', 12.99, 'disc', null, null, null);
INSERT INTO music_shop.Product (id, name, description, price, type, numberOfStrings, numberOfKeys, color) VALUES (10, 'Alice Cooper - Billion Dollars Babies', 'Praesent vel enim egestas, consectetur magna ac, congue elit. Sed feugiat venenatis maximus. Vestibulum eu tortor quis dolor porta blandit non a ex. Nulla sit amet odio egestas, pulvinar orci sed, pellentesque enim. Vivamus ac ultricies tortor. Pellentesque mollis eros id tincidunt tempor. Aenean varius ultrices consequat.

', 15.99, 'disc', null, null, null);
INSERT INTO music_shop.Product (id, name, description, price, type, numberOfStrings, numberOfKeys, color) VALUES (11, 'Deep Purple - Machine Head', 'Nam vel pulvinar mi. Suspendisse potenti. Maecenas id ullamcorper felis. Cras imperdiet ornare tellus sit amet bibendum. Curabitur lacinia cursus elit tristique tristique. Nulla quis vestibulum neque. Proin sit amet mi dui. Integer tristique urna sit amet ultrices placerat. Fusce sed malesuada lorem. Sed id eros a nisi laoreet porta. Aenean pellentesque ipsum maximus ante dapibus, et faucibus est porttitor. Phasellus et libero a ex pretium dapibus.', 19.5, 'disc', null, null, null);
INSERT INTO music_shop.Product (id, name, description, price, type, numberOfStrings, numberOfKeys, color) VALUES (12, 'Led ZeppelinLed Zeppelin 4', 'Nam ac neque quis eros aliquam tincidunt eu nec magna. Nulla libero turpis, gravida eu ultrices lobortis, consectetur sed augue. Pellentesque rhoncus tempus blandit. Aliquam sagittis bibendum augue, non cursus lorem. Nullam eget lacus tortor. Maecenas commodo, magna a convallis volutpat, turpis risus lobortis turpis, ac laoreet lacus mi vel justo. Morbi auctor mattis nisi, eget cursus urna tincidunt a. Donec non odio at purus tempus aliquam. Sed eros diam, consequat ac porttitor at, commodo in nibh. Duis sit amet magna id dolor fringilla blandit. Proin aliquet nibh eget diam ornare semper. Donec id hendrerit ligula.', 21.99, 'disc', null, null, null);
INSERT INTO music_shop.Product (id, name, description, price, type, numberOfStrings, numberOfKeys, color) VALUES (13, 'Lynyrd Skynyrd - Pronounced', 'Quisque suscipit mauris sit amet risus elementum finibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean a nisi eget ipsum congue congue ut sed erat. Vestibulum aliquet purus odio, nec ultricies sem volutpat sed. Donec egestas posuere ex sed fermentum. Nam maximus ligula non nunc laoreet, a feugiat nisl ultrices. Donec ac est laoreet, tempus erat nec, tristique nulla. Integer vitae massa lacus. Donec tortor est, commodo a metus quis, venenatis elementum lorem. Duis imperdiet vel lacus nec dapibus.', 19.99, 'disc', null, null, null);