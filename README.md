# Planet
経済を学びながらニュースの閲覧、投稿、コメントができる
ブログと掲示板の機能があるものを作成しました。
<br>

## サイトURL
[http://planet-pulchrum.com](http://planet-pulchrum.com/)
  
テストユーザーを用意してあります。  
`test0011@test.com`  
test0011  
<br>

## 機能一覧
* 管理者
  * 記事投稿(投稿、画像投稿、編集、削除)
  * 特集(特集追加、画像投稿、編集、削除)
  * コメント管理
  * ユーザー管理
<br>

* ユーザー
  * ログイン機能(新規登録、削除)
  * 投稿(ニュース掲示板、画像投稿、編集、削除)
  * コメント投稿
  <br>

* ニュース一覧表示(ユーザー別、カテゴリー別)
* 検索機能(キーワードニュース検索)
* タグ機能(タグ付け、タグ検索)
* ページネーション
* スクロール、スワイプ

## DEMO
レスポンシブ
![image-lg](https://user-images.githubusercontent.com/77516643/115987512-531bd880-a5f0-11eb-8c4b-0c1277e2ad53.png)
<br>
<img width="300" alt="image-sm" src="https://user-images.githubusercontent.com/77516643/115987487-413a3580-a5f0-11eb-9307-d502f2dbd77e.jpg">
<br>


* 管理者
  *. 特集を選択、又は追加をして記事を投稿、編集、削除ができます。
  *. カテゴリーの追加、編集、削除ができます。
  *. ユーザー、コメントの削除ができます。
![image-admin](https://user-images.githubusercontent.com/77516643/115987551-78104b80-a5f0-11eb-9769-b866be9f6074.png)
<br>

* ユーザー(ログイン時)
  *. カテゴリーを選択しニュースを掲示板に投稿できます。
  *. 投稿したものを編集、削除できます。
  *. ニュースにコメントができます。
![image-post](https://user-images.githubusercontent.com/77516643/115989888-8fa10180-a5fb-11eb-8c48-454657f394d8.png)
![image-comment](https://user-images.githubusercontent.com/77516643/115989911-ac3d3980-a5fb-11eb-928a-5217ae9ff876.png)
<br>
 
## 開発環境
* PHP:7.2-fpm
* laravel
* MySQL:8.0
* nginx
* Docker
<br>

* AWS
  * EC2
  * RDS
  * ROUTE53