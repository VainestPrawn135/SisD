CREATE DATABASE videojuegos;
ALTER DATABASE videojuegos charset=utf8mb4;
USE videojuegos;

CREATE TABLE CATALOGO_JUEGOS(
	JUEGOS_ID INT AUTO_INCREMENT PRIMARY KEY, 
	NOMBRE_JUEGO VARCHAR(50), 
	JUEGO_ID_IDIOMA INT,
	JUEGO_ID_PLAT INT, 
	JUEGO_ID_CAT INT,
	JUEGO_ID_TIPO INT, 
	JUEGO_ID_DESA INT, 
	JUEGO_ID_CLAS INT, 
	NUM_JUGADORES VARCHAR(50), 
	TAMANO VARCHAR(50), 
	DESCRIPCION VARCHAR(500), 
	FECHA_LANZAMIENTO VARCHAR(50), 
	CANTIDAD_STOCK INT, 
	PRECIO INT
    );

CREATE TABLE CATEGORIA(
	CAT_ID INT PRIMARY KEY,
	NOMBRE_CAT VARCHAR(20)
    );

CREATE TABLE CLASIFICACION (
	CLAS_ID INT PRIMARY KEY,
	NOMBRE_CLAS VARCHAR(20)
    );

CREATE TABLE CLIENTE(
	CLIENTE_ID INT AUTO_INCREMENT PRIMARY KEY, 
	NOMBRE VARCHAR(50), 
	APP VARCHAR(50), 
	APM VARCHAR(50), 
	CLIENTE_USUARIO VARCHAR(50), 
	CONTRASEÑA VARCHAR(15), 
	CORREO VARCHAR(50)
    );

CREATE TABLE DESARROLLADORA(
	DESA_ID INT PRIMARY KEY, 
	NOMBRE_DESA VARCHAR(20)
    );

CREATE TABLE IDIOMA(
	IDIOMA_ID INT PRIMARY KEY,
	LENGUAJE VARCHAR(20)
    );

CREATE TABLE PLATAFORMA(
	PLAT_ID INT PRIMARY KEY,
	NOMBRE_PLAT VARCHAR(20)
    );

CREATE TABLE TIPO(
	TIPO_ID INT PRIMARY KEY, 
	NOMBRE_TIPO VARCHAR(20)
    );

CREATE TABLE VENDEDOR(
	VENDEDOR_ID INT AUTO_INCREMENT PRIMARY KEY, 
	NOMBRE VARCHAR(50), 
	APP VARCHAR(50), 
	APM VARCHAR(50), 
	VENDEDOR_USUARIO VARCHAR(50), 
	CONTRASEÑA VARCHAR(15), 
	CORREO VARCHAR(50)
	);

CREATE TABLE VENTA(
	VENTA_ID INT AUTO_INCREMENT PRIMARY KEY, 
	VENTA_ID_CLIENTE INT, 
	VENTA_ID_JUEGO INT, 
	VENTA_ID_VENDEDOR INT, 
	FECHA DATE
    );

ALTER TABLE CATALOGO_JUEGOS ADD FOREIGN KEY (JUEGO_ID_CAT) REFERENCES CATEGORIA (CAT_ID) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE CATALOGO_JUEGOS ADD FOREIGN KEY (JUEGO_ID_CLAS) REFERENCES CLASIFICACION (CLAS_ID) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE CATALOGO_JUEGOS ADD FOREIGN KEY (JUEGO_ID_DESA) REFERENCES DESARROLLADORA (DESA_ID) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE CATALOGO_JUEGOS ADD FOREIGN KEY (JUEGO_ID_IDIOMA) REFERENCES IDIOMA (IDIOMA_ID) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE CATALOGO_JUEGOS ADD FOREIGN KEY (JUEGO_ID_PLAT) REFERENCES PLATAFORMA (PLAT_ID) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE CATALOGO_JUEGOS ADD FOREIGN KEY (JUEGO_ID_TIPO) REFERENCES TIPO (TIPO_ID) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE VENTA ADD FOREIGN KEY (VENTA_ID_CLIENTE) REFERENCES CLIENTE (CLIENTE_ID) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE VENTA ADD FOREIGN KEY (VENTA_ID_VENDEDOR) REFERENCES VENDEDOR (VENDEDOR_ID) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE VENTA ADD FOREIGN KEY (VENTA_ID_JUEGO) REFERENCES CATALOGO_JUEGOS (JUEGOS_ID) ON DELETE CASCADE ON UPDATE CASCADE;

Insert into CATEGORIA values (1,'FPS');
Insert into CATEGORIA values (2,'SANDBOX');
Insert into CATEGORIA values (3,'THIRD PERSON');
Insert into CATEGORIA values (4,'RPG');
Insert into CATEGORIA values (5,'SURVIVAL HORROR');
Insert into CATEGORIA values (6,'ADVENTURE');
Insert into CATEGORIA values (7,'PUZZLE');
Insert into CATEGORIA values (8,'ACTION');
Insert into CATEGORIA values (9,'STRATEGY');
Insert into CATEGORIA values (10,'ROLE');
Insert into CATEGORIA values (11,'ARCADE');
Insert into CATEGORIA values (12,'SPORTS');

Insert into CLASIFICACION values (1,'EC');
Insert into CLASIFICACION values (2,'E');
Insert into CLASIFICACION values (3,'E10');
Insert into CLASIFICACION values (4,'TEEN');
Insert into CLASIFICACION values (5,'MATURE');
Insert into CLASIFICACION values (6,'RATING PENDING');

Insert into CLIENTE values (1,'FULANITO','RODRIGUEZ','RODRIGUEZ','FULRO','123456','fulro12@tienda.com');
Insert into CLIENTE values (2,'CHANGUITO','SOSA','TERCERO','CHASILLO','123456','changuillo1213@tienda.com');
Insert into CLIENTE values (3,'CESAR','COSTA','CANTU','CECOCA','123456','CECOCA@GMAIL.com');
Insert into CLIENTE values (4,'XAVIER','LOPEZ','LOPEZ','CHABELO','123456','chabelo@HOTMAIL.com');
Insert into CLIENTE values (5,'PEDRO','INFANTE','JR','PEDROINFANTE','123456','ped_infante@outlook.com');
Insert into CLIENTE values (6,'PEDRO','INFANTE','JR','PEDROINFANTE','123456','ped_infante@outlook.com');

Insert into DESARROLLADORA values (1,'MICROSOFT');
Insert into DESARROLLADORA values (2,'ROCKSTEADY');
Insert into DESARROLLADORA values (3,'EA');
Insert into DESARROLLADORA values (4,'UNREAL');
Insert into DESARROLLADORA values (5,'BLIZZARD');
Insert into DESARROLLADORA values (6,'2K');
Insert into DESARROLLADORA values (7,'UBISOFT');
Insert into DESARROLLADORA values (8,'ACTIVISION');
Insert into DESARROLLADORA values (9,'BETHESDA SOFTWORK');
Insert into DESARROLLADORA values (10,'WARNER BROS');
Insert into DESARROLLADORA values (11,'MONOLITH SOFT');
Insert into DESARROLLADORA values (12,'NINTENDO');
Insert into DESARROLLADORA values (13,'PSYONIX');
Insert into DESARROLLADORA values (14,'SQUARE ENIX');
Insert into DESARROLLADORA values (15,'TEAM 17');
Insert into DESARROLLADORA values (16,'TWO TRIBES');
Insert into DESARROLLADORA values (17,'CAPCOM');
Insert into DESARROLLADORA values (18,'SEGA');
Insert into DESARROLLADORA values (19,'RISING STAR GAMES');
Insert into DESARROLLADORA values (20,'BANDAI NAMCO');
Insert into DESARROLLADORA values (21,'ROCKSTAR');
Insert into DESARROLLADORA values (22,'P-STUDIO');
Insert into DESARROLLADORA values (23,'KOJIMA-PRODUCTIONS');
Insert into DESARROLLADORA values (24,'NAUGHTY DOG');
Insert into DESARROLLADORA values (25,'That Game Company');
Insert into DESARROLLADORA values (26,'FROM SOFTWARE');
Insert into DESARROLLADORA values (27,'GUERRILLA GAMES');
Insert into DESARROLLADORA values (28,'TOBY FOX');
Insert into DESARROLLADORA values (29,'CD Projekt RED');
Insert into DESARROLLADORA values (30,'PLAYHEAD');
Insert into DESARROLLADORA values (31,'Sony Santa Monica');
Insert into DESARROLLADORA values (32,'Team Ninja');
Insert into DESARROLLADORA values (33,'Polyphony Digital');

Insert into IDIOMA values (1,'SPANISH');
Insert into IDIOMA values (2,'ENGLISH');
Insert into IDIOMA values (3,'FRANCES');
Insert into IDIOMA values (4,'GERMAN');
Insert into IDIOMA values (5,'JAPANESE');
Insert into IDIOMA values (6,'S-E-F-G-J');

Insert into PLATAFORMA values (1,'XBOX ONE');
Insert into PLATAFORMA values (2,'PLAYSTATION 4');
Insert into PLATAFORMA values (3,'NINTENDO SWITCH');

Insert into TIPO values (1,'GAME');
Insert into TIPO values (2,'DLC');
Insert into TIPO values (3,'SEASON PASS');

Insert into VENDEDOR values (1,'CARLOS','ESPARZA','MEDEL','CARESME','123456','caresme@tienda.com');
Insert into VENDEDOR values (2,'ARI','SOLÍS','SANCHEZ','ARISOSA','123456','arisosa@tienda.com');
Insert into VENDEDOR values (3,'DAN','TORRES','RDGZ','DANTORRO','123456','DTOR94@tienda.COM');
Insert into VENDEDOR values (4,'DAVID','MORENO','AIDONOU','Dave','123456','DAVE@tienda.COM');
Insert into VENDEDOR values (5,'FRANCISCO','GRANADOS','MINOR','FRANK','123456','FRANK@tienda.COM');
Insert into VENDEDOR values (6,'CRISTIAN','ZUÑIGA','HERNANDEZ','SHAKE','123456','CRIS@tienda.COM');

Insert into CATALOGO_JUEGOS values (1,'BATTLEFIELD 1',1,1,1,1,1,1,'1 - 64','80 GB','Juego ambientado en la primera guerra mundial en el cual viviras diferentes historias de los frentes de batalla','1/SEP/16',15,1200);
Insert into CATALOGO_JUEGOS values (2,'HALO 5 GUARDIANS',1,1,1,1,1,4,'2 - 24','46.19 GB','Halo 5: Guardians ofrece experiencias multijugador épicas que incluyen distintos modos, completas herramientas de construcción de niveles y un nuevo capítulo en la saga del Jefe Maestro. Y ahora, con Xbox One X, los jugadores pueden disfrutar de mejoras gráficas, resolución de hasta 4K y mayor fidelidad visual que hacen que el juego luzca mejor que nunca; todo ello manteniendo una tasa constante de 60 imágenes por segundo para conseguir la jugabilidad más fluida posible.','26/OCT/15',15,1200);
Insert into CATALOGO_JUEGOS values (3,'Forza Motorsport 7',6,1,1,1,3,4,'2 - 24','100 GB','Experimenta la emoción del automovilismo al límite en el juego de carreras de autos más completo hermoso y auténtico jamás desarrollado. Deleita la mirada con los impactantes gráficos a 60fps y resolución nativa 4K en HDR. Colecciona y corre más de 700 vehículos entre los que destaca la mayor colección de Ferrari Porsche y Lamborghini que hayas visto. Desafía tus propias habilidades en 30 famosos destinos y 200 listones con condiciones variables cada vez que regresas a la pista.','3/OCT/17',15,1200);
Insert into CATALOGO_JUEGOS values (4,'Fifa 17',6,1,12,1,3,2,'2 - 22','44.89 GB','Gracias al motor Frostbite, FIFA 18 de EA SPORTS borra los límites entre el mundo virtual y el mundo real, y le da vida los jugadores, equipos y ambientes que te sumergen en la emoción del deporte rey. ','09/OCT/17',15,1200);
Insert into CATALOGO_JUEGOS values (5,'Call of Duty Black ops 3',1,1,1,1,8,5,'2 - 18','100 GB','Call of Duty: Black Ops III combina tres modos de juego únicos: campaña, multijugador y Zombis, y ofrece a los fans el juego más profundo y ambicioso de la historia de Call of Duty. La campaña es una experiencia cooperativa en línea para hasta cuatro jugadores, pero también una emocionante aventura cinemática en solitario. El multijugador será el más profundo y cautivador de la franquicia hasta la fecha, con nuevas formas de ascender de rango y personalizar y preparar la batalla.','05/NOV/15',15,1200);
Insert into CATALOGO_JUEGOS values (6,'Assassins Creed Origins',1,1,2,1,7,5,'1','42 GB','El antiguo Egipto, una tierra de grandeza e intriga, está desapareciendo por una fiera lucha por poder. Devela los secretos oscuros y mitos olvidados mientras revives el momento de la fundación de la hermandad de los asesinos.','26/OCT/17',15,1200);
Insert into CATALOGO_JUEGOS values (7,'Call of Duty World War II',6,1,1,1,8,5,'2 - 18','90 GB','Call of Duty regresa a sus raíces con Call of Duty: WWII, una experiencia sobrecogedora que redefine la Segunda Guerra Mundial para toda una nueva generación de jugadores.','02/NOV/17',15,1200);
Insert into CATALOGO_JUEGOS values (8,'Dead Rising 4',1,1,2,1,1,5,'1 - 04','50 GB','Dead Rising 4 es el retorno del periodista gráfico Frank West en un nuevo capítulo de una de las franquicias de juegos de zombis más populares de la historia. Con un nivel inigualable de personalización de armas y personajes, ambiciosas características como nuevas clases de zombi y exotrajes, Dead ','05/DIC/16',15,1200);
Insert into CATALOGO_JUEGOS values (9,'Halo Wars II',1,1,7,1,1,4,'1','26 GB','Es la experiencia Halo con la que has soñado: controlar ejércitos enteros de Marines, Warthogs, tanques Scorpion y Spartans en el campo de batalla desde el punto de vista del Comandante. Halo Wars 2: Complete Edition es una versión completa del hit de estrategia en tiempo real que incluye TODO el contenido de Halo Wars 2. ¡Y ahora puedes jugar en gráficos nativos 4K Ultra HD con HDR en Xbox One X y Windows 10!','25/SEP/17',15,1200);
Insert into CATALOGO_JUEGOS values (10,'Star Wars Battlefront II',6,1,1,1,3,4,'2 - 40','45 GB','La Edición Deluxe Soldado de élite de STAR WARS Battlefront II convierte a tus soldados en los adversarios definitivos. Se mejoraron todas las clases de soldado (oficial, asalto, pesado y especialista), que ahora poseen una potencia de fuego superior, accesorios letales para armas y habilidades de combate épicas.','17/NOV/17',15,1200);
Insert into CATALOGO_JUEGOS values (11,'Titanfall II',6,1,1,1,3,5,'2 - 16','43 GB','En el modo un jugador, un aspirante a piloto y un veterano titán combinan sus fuerzas para completar una misión de la que no deberías ser partícipe. El modo multijugador incluye novedosos titanes, más habilidades de piloto y una mayor personalización que aceleran la jugabilidad y la vuelven tan emocionante como esperan los aficionados.','27/OCT/16',15,1200);
Insert into CATALOGO_JUEGOS values (12,'Gears of War 4',6,1,3,1,1,5,'2 - 10','120 GB','Comienza una nueva saga para una de las franquicias de videojuegos más aclamadas de la historia. Tras escapar por muy poco de un ataque a su pueblo, JD Fenix y sus amigos, Kait y Del, deben rescatar a sus seres queridos y descubrir el origen de su monstruoso enemigo. ','11/OCT/16',15,1200);
Insert into CATALOGO_JUEGOS values (13,'Forza Horizon 3',6,1,6,1,1,4,'2 - 12','56 GB','Tú estás a cargo del Festival Horizon. Personaliza todo, contrata y despide a tus amigos, y explora Australia en más de 350 autos extraordinarios. Haz que tu Horizon sea la máxima celebración de autos, música y libertad en el camino. Como lo hagas, es tu decisión.','27/SEP/16',15,1200);
Insert into CATALOGO_JUEGOS values (14,'Recore',6,1,4,1,1,5,'1','18 GB','Del legendario Keiji Inafune y los creadores de Metroid Prime llega "ReCore Definitive Edition", una aventura de acción creada para una nueva generación.','13/SEP/16',15,1200);
Insert into CATALOGO_JUEGOS values (15,'Quantum Break',6,1,3,1,1,5,'1','103 GB','Como consecuencia de una fracción de segundo de destrucción que resquebrajó el mismísimo tiempo, dos hombres descubren que han cambiado y que obtuvieron poderes extraordinarios. Uno de ellos puede viajar en el tiempo y pondrá todo lo que está a su disposición por controlar este poder. El otro usará sus nuevas habilidades para intentar derrotar al primero y reparar el tiempo antes de que se desgarre por completo...','04/ABR/16',15,1200);
Insert into CATALOGO_JUEGOS values (16,'Halo the Master chief Collection',6,1,1,1,1,5,'2 - 16','63 GB','Por primera vez, toda la historia del Jefe Maestro en una sola consola. Incluye una versión remasterizada de Halo 2: Anniversary, junto con Halo: Combat Evolved Anniversary, Halo 3 y Halo 4, la nueva serie digital Halo: Nightfall y acceso a la beta multijugador de Halo 5: Guardians, formando la experiencia de Halo definitiva.*','10/NOV/15',15,1200);
Insert into CATALOGO_JUEGOS values (17,'Minecraft',1,1,4,1,1,3,'1 - 12','172 GB','Explora mundos generados al azar y construye cosas increíbles, desde la más humilde de las casas hasta el más majestuoso de los castillos. Juega en el modo creativo con recursos ilimitados o extrae en las profundidades del mundo, crea armas y armaduras para defenderte de enemigos peligrosos en el modo supervivencia.','14/JUL/15',15,1200);
Insert into CATALOGO_JUEGOS values (18,'WWE 2k18',2,1,6,1,6,4,'2 - 6','44 GB','¡La mayor franquicia de videojuegos de la historia de la WWE vuelve con WWE 2K18! Con Seth Rollins como Superstar de portada, WWE 2K18 promete acercarlos como nunca antes al ring con una acción impactante, unos gráficos asombrosos, drama, emoción, nuevos modos de juego, tipos de combate adicionales, minuciosas opciones de creación y todo lo que tanto les gusta de WWE 2K. Sé diferente.','16/OCT/17',15,1200);
Insert into CATALOGO_JUEGOS values (19,'The Evil Within 2',6,1,3,1,9,5,'1','30 GB','Surgido de la mente maestra de Shinji Mikami, The Evil Within 2 es la última evolución del survival horror. El detective Sebastián Castellanos lo ha perdido todo, pero podrá salvar a su hija si desciende una vez más al mundo de pesadilla de STEM. Amenazas terribles surgen de cada esquina mientras todo se retuerce y se distorsiona a su alrededor. ¿Se enfrentará a la adversidad cara a cara, con armas y trampas, o se moverá entre las sombras para sobrevivir?','12/OCT/16',15,1200);
Insert into CATALOGO_JUEGOS values (20,'La Tierra Media: Sombras de Guerra',2,1,4,1,10,5,'1','71 GB','En esta épica secuela del galardonado La Tierra Media: Sombras de Mordor, infíltrate en las líneas enemigas para forjar un ejército, conquistar fortalezas y dominar Mordor desde su interior. Experimenta la forma en que el sistema Némesis crea historias personales únicas para cada enemigo y seguidor, y enfrenta el poder total de Sauron, el Señor Oscuro, y sus espectros del anillo en esta épica nueva historia de la Tierra Media.','10/OCT/17',15,1200);
Insert into CATALOGO_JUEGOS values (21,'Persona 5',2,2,4,1,22,5,'1','20.5 GB','Persona 5 es el nuevo episodio de esta veterana serie de aventuras de rol creada por Atlus, que ahora en PlayStation 4 y PS3, nos pone a los mandos de los Phantom Thieves of Hearts, un grupo de héroes nocturnos, una suerte de ladrones, dedicados a robar los oscuros objetos de deseo que atormentan a la sociedad desde el Metaverso, esa extraña dimensión que representa el inconsciente colectivo de la humanidad.','04/04/17',15,1099);
Insert into CATALOGO_JUEGOS values (22,'Metal Gear Solid V: The Phantom Pain',6,2,8,1,23,5,'1 - 16','26.97 GB','Metal Gear Solid 5 es la última aventura de Snake bajo las órdenes de Hideo Kojima. Tras la controvertida salida de éste de Konami, se cuenta entre los episodios más arriesgados y potentes de la franquicia de espionaje, ciencia ficción y, ahora, también mundo abierto. Acompañado por personajes como Quiet, Ocelot o el ya entrañable perro, el modo historia de MGS 5 nos permite escoger quién deseamos que nos acompañe en sus distinta....','01/09/15',15,1099);
Insert into CATALOGO_JUEGOS values (23,'Uncharted 4: A Thief´s End',1,2,6,1,24,4,'1 - 10','47.45 GB','Uncharted 4: El Desenlace del Ladrón es un juego exclusivo de PS4 creado por Naughty Dog, y editado por Sony Interactive Entertainment. Un videojuego que viene a cerrar las aventuras del conocido buscador de tesoros tan conocido en consolas PlayStation. El título es una aventura de acción y exploración en tercera persona protagonizada por Nathan Drake, que en esta entrega de la saga se plantea un dilema existencial tras todas las hazañas vividas en los anteriores videojuegos...','16/05/16',15,1099);
Insert into CATALOGO_JUEGOS values (24,'Journey',1,2,6,1,25,1,'1 - 2','2.51 GB','Versión para PS4 de Journey, el videojuego de los creadores del original Flower, que está planteado como una experiencia de aventura on-line donde los jugadores tienen que explorar un mundo alienígena conjuntamente con jugadores de todo el mundo con los que podremos interactuar.','21/06/15',15,1099);
Insert into CATALOGO_JUEGOS values (25,'Bloodborne',6,2,4,1,26,4,'1 - 3','27.19 GB','Bloodborne es un videojuego exclusivo para PS4 de los creadores de Demon´s Souls y la trilogía Dark Souls, FromSoftware. El videojuego nos traslada al siglo XIX, a una especie de oscuro y tétrico Londres victoriano donde encontraremos todos los ingredientes de la saga Souls: exploración, un online distintivo y unos enfrentamientos a vida o muerte. La gran diferencia es que Bloodborne se orienta al combate ofensivo, arrebatándonos el escudo..','25/03/15',15,1099);
Insert into CATALOGO_JUEGOS values (26,'Horizon: Zero Dawn',1,2,3,1,27,4,'1','41.71 GB',' Horizon: Zero Dawn es un videojuego de Guerrilla Games, los creadores de la saga Killzone, que presenta un cuidado universo de fantasía con un sugerente planteamiento argumental y jugable. El juego, exclusivo de PlayStation 4 y con mejoras para PS4 Pro, se ambienta en un mundo abierto en el que la naturaleza ha reclamado las ruinas de una civilización olvidada y la humanidad ya no es la especie dominante, sino unas avanzadas maquinas de origen desconocido.. ','01/03/17',15,1099);
Insert into CATALOGO_JUEGOS values (27,'Undertale',2,2,4,1,28,3,'1','346.1 MB','Aventura de rol donde nadie tiene por qué salir lastimado, si quieres, en medio de una trama conmovedora y con énfasis en el humor ambientada en un mundo lleno de monstruos.','15/07/17',15,1099);
Insert into CATALOGO_JUEGOS values (28,'The Witcher 3: Wild Hunt',6,2,4,1,29,5,'1','30.98 GB','The Witcher 3: Wild Hunt es la tercera entrega de la serie The Witcher (basada en los cuentos y novelas de fantasía creada por el escritor polaco Andrzej Sapkowski), que nos devuelve al conocido cazador de bestias Geralt de Rivia en una nueva aventura. En esta ocasión enfrentándose a la famosa Cacería Salvaje que le da nombre, y que se convierte en un desafío de dimensiones colosales para la primera incursión de la serie RPG del estudio polaco CD Projekt Red en los videojuegos de mundo..','19/05/15',15,1099);
Insert into CATALOGO_JUEGOS values (29,'Inside',1,2,7,1,30,1,'1','2.08 GB','Inside es un videojuego de Playdead, los creadores del maravilloso Limbo, que vuelven a apostar por la experiencia jugable en 2D y por el estilo oscuro y lúgubre de su dirección artística en un cautivador mundo oscuro que protagoniza un niño que, durante su aventura, muere de todas las formas imaginables. Un juego que combina plataformas, puzles y una historia no exenta de capacidad crítica e intelectual y con una importante carga emocional.','23/08/16',15,1099);
Insert into CATALOGO_JUEGOS values (30,'God Of War 3: Remastered',1,2,8,1,31,5,'1','39.49 GB','Remasterización en 1080 y 60 frames por segundo de God of War 3, el juego original de PlayStation 3. Ambientado en la Grecia de la mitología clásica, el tercer capítulo de la saga God of War describe el ascenso de Kratos a las alturas del monte Olimpo en busca de una venganza, alimentada por el ardor de su ira contra los que le han traicionado.','15/07/15',15,1099);
Insert into CATALOGO_JUEGOS values (31,'Overwatch',1,2,1,1,5,4,'12','7.52 GB','Overwatch es un videojuego de acción cooperativa y competitiva en primera persona desarrollado por Blizzard, creadores de juegos como Starcraft, Diablo o Warcraft, que por vez primera abordan un juego de perfil first person shooter. El título se ambienta en un futuro lejano y de fantasía, donde las decenas de héroes protagonistas son los únicos capaces de salvaguardar la paz en la Tierra de la amenaza de unos hostiles robots. Sin embargo la relevancia de Overwatch dista de ser la de...','24/05/16',15,1099);
Insert into CATALOGO_JUEGOS values (32,'BATTLEFIELD 1',1,2,1,1,5,5,'1 - 64','42.6 GB',' Battlefield 1 supone el retorno a las raíces de esta veterana serie de videojuegos de acción bélica. El conflicto se traslada a los campos de batalla de la Primera Guerra Mundial, en los que podemos pilotar una amplia variedad de vehículos terrestres, marinos y aéreos; aparte de usar también un vasto arsenal de armas de fuego.','1/SEP/16',15,1099);
Insert into CATALOGO_JUEGOS values (33,'Rocket League',1,2,12,1,13,1,'1 - 8','1.45 GB','Rocket League combina de forma espectacular las carreras de coches con el fútbol, proponiéndonos enfrentarnos a los rivales en intensos duelos en los que prácticamente todo está permitido.','07/07/15',15,1099);
Insert into CATALOGO_JUEGOS values (34,'Crash Bandicoot: N. Sane Trilogy',1,2,6,1,8,1,'1','23.32 GB','¡Crash vuelve! La trilogía original desarrollada por Naughty Dog para PlayStation se adapta a los tiempos actuales dos décadas después por Vicarious Visions (Skylanders) en PS4 bajo el nombre de Crash Bandicoot N. Sane Trilogy. Compuesto por Crash Bandicoot (1996), Cortex Strikes Back (1997) y Warped (1998), el recopilatorio está a medio camino entre el remake y la remasterización, con un planteamiento de respeto a la obra original y añadiendo nuevas opciones.','30/06/17',15,1099);
Insert into CATALOGO_JUEGOS values (35,'Ni-Oh',6,2,4,1,32,5,'1 - 2','39.27 GB','Desarrollado por el Team Ninja y a la venta en febrero 2017, este videojuego de enorme dificultad está ambientado en el Japón del siglo XVI. Nioh es un título de acción hack´n slash protagonizado por un valeroso samurái llamado William...','07/02/17',15,1099);
Insert into CATALOGO_JUEGOS values (36,'NieR: Automata',6,2,8,1,14,4,'1','45.34 GB','NieR: Automata (secuela del NieR original de 2010, que a su vez era un spin-off de la saga Drakengard) es un intenso videojuego RPG de acción con abundante exploración, plataformas y un destacado sentido de la verticalidad, desarrollado por Platinum Games y Square Enix. ¿El objetivo de la aventura? En la sintética piel del androide 2B nos embarcamos en una arriesgada misión por recuperar el hogar de la humanidad. ¿Qué funciones tiene nuestro protagonista? Se trata del androide..','07/03/17',15,1099);
Insert into CATALOGO_JUEGOS values (37,'Gran Turismo Sport',6,2,12,1,33,2,'1 - 24','42.99 GB','Gran Turismo Sport es la entrega de la conocida serie de conducción de la marca PlayStation para el año 2017, una con la que el prestigioso creativo Kazunori Yamauchi quiere tratar de demostrar que tiene entre manos la franquicia estrella del género a pesar de unos años en los que no todos sus episodios han estado a la brillante altura a la que se exhibían en los tiempos de la primera PlayStation y de PS2. ','10/08/17',15,1099);
Insert into CATALOGO_JUEGOS values (38,'SUPER MARIO ODYSSEY',1,2,6,1,12,2,'1-2','5.7GB','El título, totalmente tridimensional o en 3D, se desarrolla en el planeta Tierra, ya que Mario deja el Reino Champiñón para embarcarse en un viaje por lugares misteriosos y vivir nuevas aventuras a bordo de una aeronave, demostrando el hábil manejo de su gorra, ya que gracias a ella Mario puede tomar el control de los enemigos. En el juego hay mucho plataformeo, secretos y sorpresas, pero también abundantes partes de acción y hasta pruebas que parecen puzles.','27-OCT-17',15,1099);
Insert into CATALOGO_JUEGOS values (39,'DOOM',6,3,1,1,9,5,'1-12','23GB','Despiadados demonios, armas de destrucción y un movimiento ágil constituyen la base de este videojuego shooter en primera persona que incluye campaña y modo multijugador, además de editor de juego.El multijugador de DOOM incluye seis modos de juego para disfrutar en compañía de amigos y rivales de todo el mundo: partida a muerte, arena por clanes, sendero de guerra, dominación, cosecha de almas y tocar y congelar.','10-NOV-17',15,990);
Insert into CATALOGO_JUEGOS values (40,'THE ELDER SCROLLS V',1,3,4,1,9,5,'1','14.3GB','El exitoso The Elder Scrolls V: Skyrim de Bethesda Softworks se adapta a Nintendo Switch con una versión remasterizada, la misma disponible en PC, Xbox One y PS4, que incluye mejores gráficos y todos los DLCs o contenidos descargables de esta aventura de rol.','17-NOV-17',15,990);
Insert into CATALOGO_JUEGOS values (41,'XENOBLADE CHRONICLES 2',5,3,4,1,12,6,'1','14GB','Xenoblade Chronicles 2 para Nintendo Switch lleva a un nuevo nivel la respetada serie de aventuras de rol de Monolith Software, combinando lo mejor de sus trabajos anteriores. Exploración de un vasto mundo abierto, un extraño mundo dominado por gigantescas criaturas sobre las que habitan los humanos, y una potente narrativa para contar una historia cargada de emotividad.','1-DIC-18',15,990);
Insert into CATALOGO_JUEGOS values (42,'ROCKET LEAGUE',6,3,12,1,13,5,'1-8','4.8GB','Rocket League combina de forma espectacular las carreras de coches con el fútbol, proponiéndonos enfrentarnos a los rivales en intensos duelos en los que prácticamente todo está permitido.El concepto del manejo es totalmente arcade, apoyándose en un concepto de la física totalmente exagerado que le sienta de maravilla a los intensos encuentros de cinco minutos que duran en Rocket League. En resumen, auténticos bólidos, fútbol y propulsores para un juego multijugador muy divertido.','14-NOV-17',15,990);
Insert into CATALOGO_JUEGOS values (43,'L.A. NOIRE',2,3,6,1,21,5,'1','14GB','L. A. Noire, es una remasterización del videojuego de Team Bondi y Rockstar que combina acción, elementos de mundo abierto y novela visual. Ambientado en Los Ángeles, año 1947, el juego recrea fielmente la época con numerosas referencias al cine negro y música jazz, así como a una excelente recreación facial y animaciones tanto de su protagonista, el detective Cole Phelps, como el resto de personajes que aparecen en la aventura. ','14-NOV-17',15,990);
Insert into CATALOGO_JUEGOS values (44,'OCTOPATH TRAVELER',2,3,10,1,14,6,'1','7GB','Acquire, los autores de Bravely Default, dan vida a Octopath Traveler, un JRPG para Nintendo Switch que combina una estética retro con elementos gráficos propios de la actualidad. El videojuego de Square Enix para Switch apuesta por conservar la esencia más tradicional de las aventuras de rol: buena historia (contada a través de ocho personajes), combates de dificultad ajustada y un inspirado apartado audiovisual.','21-ENE-18',15,990);
Insert into CATALOGO_JUEGOS values (45,'ZELDA:BREATH OF THE WILD',1,3,6,1,12,4,'1','13GB','Esta es la carta de presentación de The Legend of Zelda: Breath of the Wild para Wii U y Switch, una épica aventura que lleva la acción de esta veterana franquicia a un gigantesco mundo abierto que podemos explorar con total libertad. ¡No hay límites! Link puede coger un caballo, o cualquier otra montura, y explorar la nueva Hyrule siguiendo el orden que desee el jugador, pues la historia ya no sigue un camino lineal..','3-MAR-17',15,990);
Insert into CATALOGO_JUEGOS values (46,'FIFA 18',6,3,12,1,3,2,'1-2','14.3','El mejor fútbol de EA Sports regresa con FIFA 18. El videojuego de simulación deportiva, que cuenta con Cristiano Ronaldo como protagonista de su portada, promete su entrega más ambiciosa hasta la fecha, ya que desde EA Sports se asegura que para la temporada de fútbol 2017-2018 se ofrecerá el mayor salto de calidad dentro del campo de juego. ','29-SEP-17',15,990);
Insert into CATALOGO_JUEGOS values (47,'WORMS WMD',2,3,8,1,15,4,'1-6','4.6GB',' Videojuego de la saga Worms de Team 17 que con Worms WMD (Weapons of Mass Destruction) presenta la posibilidad de luchar con vehículos y fortificaciones, además de recibir un completo rediseño general para poder adaptarse a los nuevos tiempos. Entre estas destaca la opción de ser esquivo y esconderse en edificios, o la de usar vehículos como tanques y helicópteros en batalla.','23-NOV-17',15,990);
Insert into CATALOGO_JUEGOS values (48,'RESIDENT EVIL:REVELATIONS',1,3,6,1,17,4,'1-2','12GB','Resident Evil Revelations es la versión en alta definición del juego de la saga que vio la luz en 3DS y que ha sido considerado como una de las mejores entregas recientes de la serie Resident Evil. El título para Nintendo Switch cuenta con mejorados efectos de iluminación y contenidos adicionales, entre los que se incluye un terrorífico enemigo nuevo, un modo de dificultad extra y mejoras para el Modo Asalto.','28-NOV-17',15,990);
Insert into CATALOGO_JUEGOS values (49,'SONIC FORCES',1,3,8,1,18,3,'1','7GB','Sonic Forces es la nueva entrega del Sonic Team protagonizada por la carismática mascota de Sega. En el título los jugadores pueden experimentar la acción acelerada del Sonic moderno, trasladarse al pasado con las peligrosas plataformas de la versión más clásica y utilizar nuevos artilugios como la opción de Personalizar al propio Personaje Héroe.','7-NOV-17',15,990);
Insert into CATALOGO_JUEGOS values (50,'MARIO RABBIDS KINGDOM BATTLE',1,3,9,1,7,3,'1-2','2.5GB','Mario + Rabbids Battle Kingdom (Mario X Rabbids) es un juego de rol y estrategia por turnos de Ubisoft para Nintendo Switch que utiliza el motor de juego de Ubisoft, Snowdrop Engine. El videojuego nos propone un tour o viaje al Reino Champiñón en modo de cooperativo local con todo el humor de las dos conocidas franquicias. Los jugadores eligen entre 8 personajes jugables: Mario, Luigi, Yoshi y la princesa Peach de la franquicia Mario, así como sus versiones Rabbids','29-AGO-17',15,990);
Insert into CATALOGO_JUEGOS values (51,'LUMO',1,3,7,1,19,2,'1','3.1GB','Juega como un pequeño mago con un objetivo aparentemente sencillo: atravesar un castillo. Nada más lejos de la realidad, desde una perspectiva isométrica el jugador deberá explorar en Lumo centenares de habitaciones, resolver puzles, traer maquinaria antigua a la vida, recoger runas y aprender hechizos, o descubrir zonas ocultas en la misteriosa fortaleza. Una aventura arcade con inspiraciones en videojuegos clásicos del género en 8 bits....','16-NOV-17',15,990);
Insert into CATALOGO_JUEGOS values (52,'POKKEN TOURNAMENT DX',1,3,11,1,20,3,'1-2','3.2GB','¡Qué comience el combate! El videojuego de lucha Pokkén Tournament de Wii U da el salto a Nintendo Switch con una versión mejorada que incluye todos los contenidos adicionales del original de salones recreativos, entre los que destaca la presencia de nuevas criaturas con las que pelear como Empoleon, Scizor o Darkrai entre otros. ','22-SEP-17',15,990);
Insert into CATALOGO_JUEGOS values (53,'SPLATOON 2',1,3,8,1,12,3,'1-8','3.1GB','Splatoon 2 es la secuela del colorido videojuego de acción-shooter de Wii U, que apuesta por mejorar la formula con más características jugables, mapas y armas inéditas en su lanzamiento para Nintendo Switch. Así, el juego de Nintendo saca partido al control de movimiento del mando Pro del sistema y los Joy-Con permitiendo apuntar con ellos, además de contar con modo cooperativo local para cuatro jugadores de lo más alocado, y un multijugador online con chat de voz y SplatNet.. ','21-JULIO-17',15,990);
Insert into CATALOGO_JUEGOS values (54,'MARIO KART 8 DELUXE',1,3,12,1,12,2,'1-12','6,75GB','Nintendo Switch ofrece una versión corregida y aumentada del memorable videojuego de conducción arcade lanzado en mayo de 2014. Con una apuesta por permitir al usuario jugar donde quiera y cuando quiera, incluso en partidas multijugador local para ocho pilotos, Mario Kart 8 Deluxe recupera los populares circuitos y personajes de la versión de Wii U y todos sus contenidos descargables así como nuevos invitados: Inkling chico e Inkling chica, de Splatoon; el Rey Boo; Huesitos y Bowsy.','28-ABRIL-17',15,990);
Insert into CATALOGO_JUEGOS values (55,'LEGO MARVEL SUPERHEROES 2',1,3,6,1,10,3,'1-4','10.2GB',' Los héroes más poderosos del mundo se unen de nuevo a LEGO en un nuevo videojuego: LEGO Marvel Super Heroes 2. El título transporta a los jugadores a una batalla cósmica por un montón de lugares de Marvel aislados del espacio y el tiempo, y que ahora se encuentran en el increíble mundo abierto de Chronopolis','1-DIC-17',15,990);
Insert into CATALOGO_JUEGOS values (56,'NBA 2K18',1,3,12,1,6,2,'1-10','23GB','NBA 2K18 salta a la cancha del videojuego con todo el espíritu del mejor basket NBA con licencia oficial. El juego de 2K Sports busca sorprender otra temporada más a los seguidores del baloncesto más exigente y divertido, contando además con un uevo miembro del Hall of Fame de la NBA, icono del baloncesto y pívot dominante por excelencia, Shaquille ONeal como protagonista de la portada de la edición especial de NBA 2K18. ','15-SEP-17',15,990);

Insert into VENTA values (1,1,1,1,'22/11/17');
Insert into VENTA values (2,1,26,2,'28/11/17');
Insert into VENTA values (3,2,50,3,'28/11/17');
Insert into VENTA values (4,3,15,1,'28/11/17');
Insert into VENTA values (5,2,11,4,'28/11/17');
Insert into VENTA values (6,5,1,5,'28/11/17');
Insert into VENTA values (7,4,1,1,'28/11/17');
Insert into VENTA values (8,2,32,1,'25/11/17');
Insert into VENTA values (9,1,20,5,'20/11/17');
Insert into VENTA values (10,3,44,6,'15/11/17');
Insert into VENTA values (11,1,37,6,'15/11/17');
Insert into VENTA values (12,2,16,6,'15/11/17');
