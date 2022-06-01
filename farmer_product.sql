-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-05-30 16:11:14
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `farmer_product`
--

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` int(11) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_unit` varchar(255) NOT NULL,
  `product_details` varchar(255) NOT NULL,
  `product_expirationdate` int(255) NOT NULL,
  `product_inventory` int(255) NOT NULL,
  `product_supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `product_img`, `product_price`, `product_unit`, `product_details`, `product_expirationdate`, `product_inventory`, `product_supplier`) VALUES
(1, '榴槤', 2, 'F- durian.png', 500, '顆', '果肉呈淺黃色，果皮因成熟程度而呈綠褐色到黃褐色，味道甜美', 7, 10, '好好吃股份有限公司'),
(2, '蘋果', 2, 'F-apple.jpg', 50, '顆', '呈紅色，富含礦物質和維生素', 7, 10, '新鮮農場'),
(3, '香蕉', 2, 'F-banana.jpg', 50, '串', '香蕉含有相當多的鉀和鎂離子。而鉀能防止血壓上升及肌肉痙攣，而鎂則具有消除疲勞的效果。', 7, 10, '幸福農場'),
(4, '藍莓', 2, 'F-blueberry.jpg', 100, '盒', '成熟時帶有甜甜的風味，而酸度各異，一開始呈淺綠色，然後轉為紅紫色，最後成為藍色或深紫色', 7, 10, '快樂農場'),
(5, '哈密瓜', 2, 'F-cantaloupe.webp', 300, '顆', '糖分含量高，味極香甜。果皮表面有網紋，果肉有綠色、白色、橙色等多品種', 7, 10, '快樂農場'),
(6, '楊桃', 2, 'F-carambola.jpg', 50, '盒', '楊桃是水分很多的水果，果汁清涼可口，解渴消暑，更有獨特的風味。', 7, 10, '好好吃股份有限公司'),
(7, '櫻桃', 2, 'F-cherry.jpg', 200, '盒', '吃起來口感甜中帶微酸、果肉滋味純美。', 7, 10, '幸福農場'),
(8, '蔓越莓', 2, 'F-cranberry.jpg', 150, '盒', '蔓越橘富含抗氧化的多酚類物質，適當服用，有增強免疫系統、防止泌尿系統感染的作用。', 7, 10, '快樂農場'),
(9, '葡萄', 2, 'F-grape.jpg', 100, '串', '一類常見的落葉木質藤本植物，其果實是漿果類水果。', 7, 10, '好好吃股份有限公司'),
(10, '芭樂', 2, 'F-guava.jpg', 25, '個', '含有豐富維生素C，為低熱量、高纖維、水分高，易有飽足感之水果，是非常好的保健食品。', 7, 10, '快樂農場'),
(11, '青江菜', 1, 'v_leafy_bokchoy.png', 30, '把', '莖葉均使用，求新鮮。嫩莖食用常浸入香料中。在各系菜餚中多維持原鮮艷嫩綠色彩', 7, 10, '新鮮農場'),
(12, '高麗菜', 1, 'v_leafy_cabbage.png', 60, '顆', '營養相當豐富，含有大量維生素C、纖維素、碳水化合物和各種礦物質', 7, 10, '新鮮農場'),
(13, '白花椰菜', 1, 'v_leafy_cauliflower.jpg', 60, '顆', '花椰菜富含維生素B群、C，這些成分屬於水溶性，易受熱溶出而流失，所以煮花椰菜不宜高溫烹調，也不適合水煮。', 7, 10, '好好吃股份有限公司'),
(14, '紫高麗菜', 1, 'v_leafy_red-cabbage.png', 80, '顆', '紫甘藍原產於地中海至北海沿岸，其紫色葉球可食用，含有各種維生素和礦物質，尤其富含維生素C。', 7, 10, '快樂農場'),
(15, '大黃瓜', 1, 'v_melons_corms_cucumber_3.png', 50, '條', '含水極高，且含丙醇二酸，可抑制糖類轉化為脂肪，被視為減肥食品。嫩籽含維生素E較多', 7, 10, '幸福農場'),
(16, '小黃瓜', 1, 'v_melons_corms_cucumbers_7.jpg', 10, '條', '小黃瓜可生吃也可榨汁，入饌常作涼菜。', 7, 10, '幸福農場'),
(17, '南瓜', 1, 'v_melons_corms_pumpkins.png', 80, '個', '冬季熟果果肉是黃色，可食用，含維他命A、糖、澱粉質、胡蘿蔔素，味美。可整塊烤熟或煮熟後食用，或打成泥。種仁類似瓜子，烤或炒熟後可食。莖葉可作為青菜。', 7, 10, '幸福農場'),
(18, '櫛瓜', 1, 'v_melons_corms_zucchini_3.jpg', 50, '條', '本品種曾被視為美洲南瓜的變種而擁有學名「Cucurbita pepo var. cylindrica」', 7, 10, '好好吃股份有限公司'),
(19, '馬鈴薯', 1, 'v_melons_corms_potatoes.jpg', 20, '顆', '馬鈴薯具有很高的營養價值和藥用價值。它富含大量碳水化合物，能供給人體大量的熱能。', 7, 10, '好好吃股份有限公司'),
(20, '洋蔥', 1, 'v_spices_onions_2.jpg', 20, '顆', '生的時候味道辛辣，但是烹飪之後不會太刺激，且相反會帶來甜味。煮得越熟的洋蔥，甜度越高，這是因為洋蔥中的碳水分合物每100克有9克，相對比其他蔬菜高，而且含水量高，有利在高溫翻炒時，循序漸進地進行梅納反應，當炒至如法式洋蔥湯般黃褐色時，甜度會達至最高。', 7, 10, '好好吃股份有限公司'),
(21, '螃蟹', 4, 's_crab_2.png', 1000, '隻', '螃蟹富含優質蛋白質，蟹肉較細膩，肌肉纖維中含有10餘種游離胺基酸，其中穀氨酸、脯氨酸、精氨酸含量較多', 7, 10, '好好吃股份有限公司'),
(22, '龍蝦', 4, 's_lobster_2.jpg', 800, '隻', '一般清蒸或水煮後劈成兩半，灑上檸檬汁或抹上奶油就可上桌，也可以碳烤後撒上胡椒，或是把肉剔出來，拌上醬料，夾在長條麵包里做成蝦卷。', 7, 10, '幸福農場'),
(23, '泰國蝦', 4, 's_shrimp_4.jpg', 400, '盒', '淡水長臂大蝦的肉質結實鮮甜有嚼勁，美味遠勝市場常見的草蝦與白蝦，因為大受歡迎故發展出許多菜色，常見的菜色有燒酒蝦、鹽燒蝦、胡椒蝦、鹽酥蝦以及蒜味蝦等。', 7, 10, '幸福農場'),
(24, '生蠔', 4, 's_oyster_1.jpg', 600, '盒', '生食，佐以檸檬汁、辣汁或雞尾酒醬汁等', 7, 10, '新鮮農場'),
(25, '鮪魚', 4, 's_tuna.png', 2000, '盒', '魚體之前腹段，油脂達90%，成網狀般的均勻分佈，猶如像松板牛肉，雪花飄飄，紅中帶白，肉質肥美濃郁，入口即化，屬頂級。', 7, 10, '好好吃股份有限公司'),
(26, '鮭魚', 4, 's_salmon_4.jpg', 800, '盒', '本店選擇新鮮度好、肉質鮮紅、口感鮮Q，品質最優良的鮪魚做成生魚片。', 7, 10, '幸福農場'),
(27, '吳郭魚', 4, 's_snapper.jpg', 100, '條', '吳郭魚在華人百姓家庭很受歡迎，烹飪中常把牠以類似紅燒鯉魚的食譜來處理。', 7, 10, '新鮮農場'),
(28, '伊比利豬', 3, 'pork029.jpeg', 1500, '盒', '玫瑰紅色澤肌理間分佈著雪白細致油花紋理，完美呈現油香不膩、肉嫩Q彈、具榛果香甜的驚人絕品風味!', 7, 10, '好好吃股份有限公司'),
(29, '日本和牛', 3, 'beef013.jpeg', 2500, '盒', '其油脂含量介於肋眼與菲力之間，大理紋石油花分布均勻，口感厚實、軟嫩適中、香嫩多汁', 7, 10, '新鮮農場'),
(30, '烏骨雞腿', 3, 'chicken010.jpeg', 300, '盒', '烏骨雞是非常好的溫補雞種，含豐富的優質蛋白質、DHA、EPA等，都是人體所需的重要元素，堅持友善平飼的方式，肉質更是細緻軟嫩卻不鬆散。', 7, 10, '新鮮農場'),
(31, '五花肉', 3, 'pork029.jpeg', 250, '盒', '五花肉是豬腹部的肉，入口即化，多汁、肉質較軟嫩', 7, 10, '好好吃股份有限公司'),
(32, '菲力牛排', 3, 'beef003.jpeg', 400, '盒', '菲力是牛肉最嫩的部位，數量稀少，脂肪也少，吃起來鮮甜多汁。', 7, 10, '好好吃股份有限公司'),
(33, '羊小排', 3, 'beef017.jpeg', 1080, '盒', '精選紐西蘭六個月以下的頂級小羔羊，香甜無羶味，採用肩胛部位，肉質香嫩細緻、Q彈又有嚼勁', 7, 10, '幸福農場');

-- --------------------------------------------------------

--
-- 資料表結構 `product_type`
--

CREATE TABLE `product_type` (
  `product_type_sid` int(11) NOT NULL,
  `product_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `product_type`
--

INSERT INTO `product_type` (`product_type_sid`, `product_type`) VALUES
(1, '蔬菜'),
(2, '水果'),
(3, '肉品'),
(4, '海鮮'),
(5, '餐點'),
(6, '客製化餐點');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- 資料表索引 `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
