<!-- 始めにPHP構文を書く -->
<?php
require_once('Encode.php');

// 最初に変数を定義しておかないとエラーになる
$family_name = '';
$first_name = '';
$email = '';
$gender = '';
$select = '';
$textarea = '';

//投稿がある場合は投稿されたデータを、そうでなければ空白で定義する
//定義しておかないとエラーになる
if(isset($_POST["family_name"]) === true) {
	$family_name = $_POST["family_name"];
}
if(isset($_POST["first_name"]) === true) {
	$first_name = $_POST["first_name"];
}
if(isset($_POST["email"]) === true) {
	$email = $_POST["email"];
}
if(isset($_POST["gender"]) === true) {
	// genderの値に応じて、switch文で処理を分岐させる
	switch ($_POST["gender"]) {
        case 'male':
            $gender = '男性';
            break;
        case 'female':
            $gender = '女性';
            break;
        default :
            $gender = '選択肢が選択されていません。';
            break;
    }
}
if(isset($_POST["select1"]) === true) {
	// select1の値に応じて、switch文で処理を分岐させる
	switch ($_POST["select1"]) {
        case 'answer_1':
            $select = 'チラシ';
            break;
		case 'answer_2':
			$select = '広告';
			break;
		case 'answer_3':
			$select = 'インターネット';
			break;
        default :
            $select = '選択肢が選択されていません。';
            break;
    }
}
if(isset($_POST["textarea1"]) === true) {
	$textarea = $_POST["textarea1"];
}

//投稿がある場合のみ処理を行う
if(isset($_POST["send"]) === true) {
	if($family_name === '') {
		// 送信後、変数がカラであればエラーメッセージを表示
		$family_name = '氏が入力されていません。';
	}
	if($first_name === '') {
		// 送信後、変数がカラであればエラーメッセージを表示
		$first_name = '名が入力されていません。';
	}
	if($email === '') {
		// 送信後、変数がカラであればエラーメッセージを表示
		$email = 'メールアドレスが入力されていません。';
	}
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>フォームサンプル:確認画面</title>
</head>

<body>
<h1 class="mt-3 mb-5 text-center">フォームサンプル</h1>
	<div class="container-fluid ml-auto mr-auto" style="width: 800px;">
		<form method="post" action="finish.php">
			<div class="border-bottom border-secondary">
				<label>氏：</label>
				<p class="mb-1"><?=e($family_name); ?></p>
			</div>
			<div class="mt-2 border-bottom border-secondary">
				<label>名：</label>
				<p class="mb-1"><?=e($first_name); ?></p>
			</div>
			<div class="mt-2 border-bottom border-secondary">
				<label>メールアドレス：</label>
				<p class="mb-1"><?=e($email); ?></p>
			</div>
			<div class="mt-2 border-bottom border-secondary">
				<label>性別：</label>
				<p class="mb-1"><?=e($gender); ?></p>
			</div>
			<div class="mt-2 border-bottom border-secondary">
				<label>当社を知った経緯：</label>
				<p class="mb-1"><?=e($select); ?></p>
			</div>
			<div class="mt-2 border-bottom border-secondary">
				<label>ご意見：</label>
				<p class="mb-1"><?=e($textarea); ?></p>
			</div>
			<a class="mt-3 btn btn-secondary" href="index.html">戻る</a>
			<input type="submit" name="btn_submit" class="mt-3 ml-3 btn btn-primary" value="送信">
			<input type="hidden" name="family_name" value="<?=e($family_name); ?>">
			<input type="hidden" name="first_name" value="<?=e($first_name); ?>">
			<input type="hidden" name="email" value="<?=e($email); ?>">
			<input type="hidden" name="gender" value="<?=e($gender); ?>">
			<input type="hidden" name="select" value="<?=e($select); ?>">
			<input type="hidden" name="textarea" value="<?=e($textarea); ?>">
		</form>
	</div>
</body>
</html>