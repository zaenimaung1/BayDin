<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <title>360 Degree Image Rotation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('./image/zodiac-icons/wallpaperflare.com_wallpaper (5).jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content-container {
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 8px;
            text-align: left;
            font-size: 1.1em;
        }

        .rotate-container {
            position: relative;
        }

        .rotate-image {
            width: 100%;
            height: auto;
            animation: rotate 40s linear infinite;
        }

        .center-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            filter: brightness(70%) saturate(70%);
            width: 350px;
            height: 450px;
        }

        .navigate-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: rgba(0, 51, 102, 0.8);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .navigate-button:hover {
            background-color: rgba(1, 77, 153, 0.589);
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        /* Custom Responsive Overrides */
        @media (max-width: 768px) {
            .content-container {
                font-size: 0.8em;
            }
            .center-image {
                width: 150px;
                height: 200px;
            }
        }

        @media (max-width: 480px) {
            .content-container {
                font-size: 0.9em;
                text-align: center;
            }
            .center-image {
                width: 120px;
                height: 170px;
            }
            .navigate-button {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-sm-12 mb-4">
                <div class="content-container ">
                    <h3 class="p-2">ရိုးရာဗေဒင်</h3>
                    <p class="p-2">ဗေဒင်ဆိုသည်မှာ လူမှုဘဝ၏ အခက်အခဲများကို သင်္ချာနှင့် သရုပ်ဆောင်ပုံများအား ဖြေရှင်းရန် အထောက်အကူဖြစ်စေသော ရှေးဟောင်း ပညာတစ်ခုဖြစ်ပါသည်။ သင့်အနာဂတ်နှင့် လောကကျော်နေရာများကို နားလည်ရန် ကျွန်ုပ်တို့၏ဆိုက်ကို လေ့လာပါ။ ဤနေရာတွင် သင့်အနာဂတ်အတွက် အထူးပြုသော အကြံဉာဏ်များနှင့် အသုံးဝင်သော အချက်အလက်များကို ရရှိနိုင်ပြီး၊ သင်၏ စကြ၀ဠာဆိုင်ရာ အလားအလာများကို အကောင်းဆုံး အသုံးချရန် ကူညီပေးပါသည်။</p>
                    <a href="./hand/index.php" class="navigate-button">ဝင်ရောက်ရန်</a>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 text-center">
                <div class="rotate-container">
                    <img src="./image/zodiac-icons/zodiac-8027004_640.png" alt="Rotating Image" class="rotate-image">
                    <img src="./image/zodiac-icons/handlese-und-wahrsage-hand-gothic-deko-halloween-tischdekoration-50340-01-removebg-preview.png" alt="Center Image" class="center-image">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
