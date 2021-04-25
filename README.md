# Planet
  
経済を学びながらニュースの閲覧、投稿、コメントができる
ブログと掲示板の機能があるものを作成しました。
  
## サイトURL
[http://planet-pulchrum.com](http://planet-pulchrum.com/)
  
テストユーザーを用意してあります。  
test0011@test.com  
test0011  

## 機能一覧
* 管理者
 * 記事投稿(投稿、画像投稿、編集、削除)
 * 特集(特集追加、画像投稿、編集、削除)
 * コメント管理
 * ユーザー管理

* ユーザー
 * ログイン機能(新規登録、削除)
 * 投稿(ニュース掲示板、画像投稿、編集、削除)
 * コメント投稿

* ニュース一覧表示(ユーザー別、カテゴリー別)
* 検索機能(キーワードニュース検索)
* タグ機能(タグ付け、タグ検索)
* ページネーション
* スクロール、スワイプ

## DEMO
レスポンシブ
![image-lg](https://github.com/daisuke-tagai/planet/issues/22#issue-866956780)
![image-sm](https://github.com/daisuke-tagai/planet/issues/21#issue-866956564)

* 管理者
 1. 特集を選択、又は追加をして記事を投稿、編集、削除ができます。
 2. カテゴリーの追加、編集、削除ができます。
 3. ユーザー、コメントの削除ができます。
![image-admin](https://github.com/daisuke-tagai/planet/issues/23#issue-866956942)

* ユーザー(ログイン時)
 1. カテゴリーを選択しニュースを掲示板に投稿できます。
 2. 投稿したものを編集、削除できます。
 3. ニュースにコメントができます。
 
## 開発環境
* PHP:7.2-fpm
* laravel
* MySQL:8.0
* nginx
* Docker

* AWS
 * EC2
 * RDS
 * ROUTE53