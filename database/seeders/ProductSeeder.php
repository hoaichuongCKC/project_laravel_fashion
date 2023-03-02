<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* Creating 20 products with random data. */
      //2 - Nam 
      DB::table('products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "name" => "Áo polo nam Aristino",
          "price" => random_int(100000,600000),
          "stock" => random_int(10,60),
          "description" => "Giới thiệu đến bạn chiếc áo polo nam
            chiếc áo sẽ giúp cho các chàng trai trở nên lịch lãm,
            sang trọng và trẻ trung hơn. Với collection này thì Coolmate
            sẽ mang cho bạn một mẫu áo polo nam với nhưng họa tiết 
            đơn giản nhưng rất trẻ trung và dễ mix đồ chắc chắn nên
              có trong tủ đồ áo nam của bạn",
          "properties" => json_encode([
            "sizes" => ["M (42-50kg)","L (52-64kg)","XL (64-72kg)"],
            "origin" => "Việt Nam",
            "colors" => ["00a8ff","dcdde1","2d3436"],
          ]),
          "category_id" => 2,
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
      //4 - Nữ 
      DB::table('products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "name" => "Sandal dây đế bánh mì nữ 5cm nhẹ êm mềm dễ đi quai mảnh rẻ bền đẹp phong cách cá tính",
          "price" => random_int(100000,600000),
          "stock" => random_int(10,60),
          "description" => "• Sản phẩm làm từ chất liệu cao cấp,chắc chắn, mềm mại, dẻo dai.\n
            • Được thiết kế theo công nghệ mới, độ chống trơn trượt cao, mang đến cho người sử dụng cảm giác thoải mái và tự tin khi di chuyển\n
            • Phong cách đơn giản nhưng vẫn hiện đại, bắt kịp xu hướng thời trang mới.\n
            • Đa số sản phẩm đều là hình chụp thật nên quý khách an tâm mua sắm\n
            • Màu sắc sp bên ngoài có thể đậm hơn hoặc nhạt hơn chút xíu so với hình ảnh\n
            • Cam kết hàng mới 100%, giá cả cạnh tranh, hợp túi tiền, chất lượng ổn định.\n",
          "properties" => json_encode([
            "sizes" => [35,36,37,38],
            "origin" => "Việt Nam",
            "colors" => ["f7f1e3"],
          ]),
          "category_id" => 4,
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
      //4 - Nữ 
      DB::table('products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "name" => "Guốc cao gót nơ lụa to xinh xắn sang chảnh hàng đẹp.",
          "price" => random_int(100000,600000),
          "stock" => random_int(10,60),
          "description" => "Giày cao cấp giá sale đó ạ. 
            Gót cao 9p, đen thì có cả 9p và 6p nhoa.
            Những đơn hàng đầu tiên của sp luôn dc giá thấp hơn nhìu nên chị em tranh thủ đặt nha. 😍😍\n
            Giày của shop em là khỏi phải nói về độ đẹp của nó rồi ạ.100 khách mua đều 100 khách khen đẹp và giá quá tốt.
            Shop em chuyên bỏ sỉ nên giá sát mặt đất rẻ nhất thị trường mà chất lượng thì tuyệt vời.\n
            Sang trọng cá tính phù hợp mọi lứa tuổi
            Sale 50%. Khách iu tranh thủ đặt khi còn giá tốt nhé ạ
            Haley Store chuyên hàng cao cấp",
          "properties" => json_encode([
            "sizes" => [36,37,38],
            "origin" => "Việt Nam",
            "colors" => ["ffffff","000000"],
          ]),
          "category_id" => 4,
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
       //1 - Nữ,Nam 
      DB::table('products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "name" => "Áo thun tay lỡ unisex SADTAGRAM TEE - Áo phông F&S nam nữ",
          "price" => random_int(100000,600000),
          "stock" => random_int(10,60),
          "description" => " Áo thun tay lỡ form rộng kiểu dáng sadboiz ngày nay
           đang trở nên phổ biến trong giới trẻ với sự đa dạng thiết kế kiểu
            dáng độc đáo bắt mắt, là sự lựa chọn không thể bỏ qua của áo thun nam,
             áo thun nữ, áo thun cặp đôi và áo thun hội nhóm ",
          "properties" => json_encode([
            "sizes" => ["S (29-35kg:M31-M41)","XXL (trên 63kg:M7)","M (36-44kg:M42-M52)","L (45-51kg:M53-M59)"],
            "origin" => "Việt Nam",
            "colors" => ["ffffff","000000"],
          ]),
          "category_id" => 1,
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
       //5 - Kid
      DB::table('products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "name" => "BỘ COTTON THỂ THAO CHO BÉ TRAI",
          "price" => random_int(100000,600000),
          "stock" => random_int(10,60),
          "description" => "Quần chíp đùi in hình cho bé gái nhiều màu sắc dễ thương kết hợp cùng với hình in đáng yêu cho bé sự thích thú khi mặc.\n
            Chất vải 100% cotton co giãn, thấm hút mồ hôi, lưng thun mềm giúp bé thoải mái khi măc.\n
            Thiết kế kiểu dễ thương, giúp bé tự tin khi mặc.",
          "properties" => json_encode([
            "sizes" => ["Size 3 : 8kg - 9kg.","Size 4 :10kg - 11kg.","Size 5: 12kg - 14kg.","Size 6: 15kg - 17kg.","Size 7: 18kg - 20kg."],
            "origin" => "Việt Nam",
            "colors" => ["ffffff","ff5252","34ace0",'4b4b4b',"fff200"],//white-red-blue-black_light-yellow
          ]),
          "category_id" => 5,
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
      //5 - Kid
      DB::table('products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "name" => "Áo ba lỗ cho bé trai bé gái mùa hè,áo lưới bé trai xuất xịn",
          "price" => random_int(100000,600000),
          "stock" => random_int(10,60),
          "description" => "Áo lưới trẻ em là món đồ mà shop chúng tôi muốn gợi ý cho các mẹ trong thời tiết nóng bức này",
          "properties" => json_encode([
            "sizes" => ["8kg - 9kg.","10kg - 11kg.","12kg - 14kg.","15kg - 17kg.","18kg - 20kg"],
            "origin" => "Việt Nam",
            "colors" => ["ff4d4d","3ae374"],//red-green
          ]),
          "category_id" => 5,
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
      //1 - All
      DB::table('products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "name" => "ÁO HOODIE UNISEX Nam Nữ BASIC CAO CẤP",
          "price" => random_int(100000,600000),
          "stock" => random_int(10,60),
          "description" => "💥 Áo Hoodie Nỉ BASIC với Chất liệu Nỉ Ngoại tốt; mang phong cách thời trang thời thượng các bạn trẻ; đặc biệt không những giúp bạn giữ ấm trong mùa lạnh mà còn có thể chống nắng, chống gió, chống bụi, chống rét, chống tia UV cực tốt, rất tiện lợi nhé!!!
           (Được sử dụng nhiều trong dịp Lễ hội, Đi chơi, Da ngoại, Dạo phố, Du lịch...)",
          "properties" => json_encode([
            "sizes" => ["M (40-52kg)","L (53-64kg)","XL (65-75kg)","XXL (76-85kg)"],
            "origin" => "Việt Nam",
            "colors" => ["ffffff","000000","3ae374"],
          ]),
          "category_id" => 1,
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
      //3 - Nữ
      DB::table('products')->insert(
          [
            "code" => "PROF" . date('Ymd'),
            "name" => "Váy đi tiệc dáng xoè dài tay thắt nơ cổ có khoá kéo",
            "price" => random_int(100000,600000),
            "stock" => random_int(10,60),
            "description" => "💥Váy mang phong cách thời trang thời thượng các bạn trẻ; đặc biệt không những giúp 
             (Được sử dụng nhiều trong dịp Lễ hội, Đi chơi, Da ngoại, Dạo phố, Du lịch...)",
            "properties" => json_encode([
              "sizes" => ["M (47-52kg)","L(53-62kg)","S (40-46kg)"],
              "origin" => "Việt Nam",
              "colors" => ["000000","f6b93b"],
            ]),
            "category_id" =>3,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
          ]
      );
      //3 - Nữ
      DB::table('products')->insert(
          [
            "code" => "PROF" . date('Ymd'),
            "name" => "Đầm sơ mi nhún eo chất liệu chiffon phong cách Hàn Quốc cho nữ",
            "price" => random_int(100000,600000),
            "stock" => random_int(10,60),
            "description" => "Phong cách: ngọt ngào và tươi mát / phong cách Nhật Bản\n
            Các yếu tố / hàng thủ công phổ biến: màu trơn, nút\n
            Phong cách: Váy chữ A\nĐộ dài tay áo: Tay áo dài\nChiều dài váy: Váy giữa\n
            Loại cổ áo: Cổ POLO\n",
            "properties" => json_encode([
              "sizes" => ["S 40-47.5kg","M 47.5-52.5kg","L 52.5-57.5kg","XL 57.5-62.5kg"],
              "origin" => "China",
              "colors" => ["000000"],
            ]),
            "category_id" => 3,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
          ]
        );
      //2- Nam
      DB::table('products')->insert(
          [
            "code" => "PROF" . date('Ymd'),
            "name" => "quần jean nam cao cấp ống túm thể thao CGJ 351",
            "price" => random_int(100000,600000),
            "stock" => random_int(10,60),
            "description" => "Quần jean luôn đa dạng về mẫu mã, kiểu dáng cũng như màu sắc. Do đó, các bạn nam có thể tha hồ lựa chọn kiểu dáng ưng ý để khoe cá tính trẻ trung, năng động mỗi khi xuống phố.
            Mẫu Quần Jean với những đường rách ngẫu hứng phối wash nhẹ phía trước rất đẹp mắt. Thiết kế hiện đại, trẻ trung, form quần ống côn trang nhã.\n
            Màu xanh đen thông dụng, cho bạn nhiều lựa chọn khi phối đồ. 
            Chất liệu jean cao cấp, đảm bảo chắc chắn, bền đẹp và vẫn có độ co dãn nhất định khi mặc.\n
              Hai túi trước và hai túi sau tiện lợi, có độ sâu rộng phù hợp.
              Bạn có thể vô tư lựa chọn vì quần có rất nhiều size.",
            "properties" => json_encode([
              "sizes" => ["Dưới 48kg","49-54kg","55-59kg","60-65kg",'66-75kg'],
              "origin" => "Việt Nam",
              "colors" => ["82ccdd"],
            ]),
            "category_id" => 2,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
          ]
        );
    }
}