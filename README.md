# FavoBook

#### 書籍のお気に入り登録と評価（レビュー）ができるアプリです。
#### herokuURL→https://favo-book.herokuapp.com/

## アプリ概要
- 私自身本が好きで、本の検索やコメント、評価ができ、また他人のレビューも見れてそのユーザーをフォローして繋がれるようなサイトがあれば良いなと思い作成しました。

## 今後の展望
- UI/UXの部分に関してはいまいちだと思っており、これから改善して行けたら良いと思います。特にアカウント詳細画面の部分のところを改善していきたいと思っております。
- 現時点ではレンタルサーバーであるherokuにデプロイして動かしているのですが、将来的にはAWS上で動かせたらなと思っております。
- 現時点では最低限動かせるといった状態なので、これからさらに改良を重ねていきたいと思っております。

## 使用画面のイメージ

<img width="1434" alt="スクリーンショット 2021-02-27 0 03 47" src="https://user-images.githubusercontent.com/67290662/109368638-1cba2980-78dd-11eb-8d6b-23d3e10208b7.png">

<img width="1435" alt="スクリーンショット 2021-02-27 0 04 18" src="https://user-images.githubusercontent.com/67290662/109368672-38253480-78dd-11eb-915b-ccd77f659526.png">

<img width="1440" alt="スクリーンショット 2021-02-27 0 04 37" src="https://user-images.githubusercontent.com/67290662/109368712-58ed8a00-78dd-11eb-81be-97c5a9751f1e.png">

<img width="1432" alt="スクリーンショット 2021-02-27 0 05 03" src="https://user-images.githubusercontent.com/67290662/109368676-39eef800-78dd-11eb-8ac8-0dcfe3423c08.png">

<img width="1440" alt="スクリーンショット 2021-02-27 18 20 50" src="https://user-images.githubusercontent.com/67290662/109383868-c1b02300-792c-11eb-9806-0a1371c39fc4.png">

<img width="1440" alt="スクリーンショット 2021-02-27 18 21 18" src="https://user-images.githubusercontent.com/67290662/109383873-caa0f480-792c-11eb-9403-20e51115ad77.png">

<img width="1433" alt="スクリーンショット 2021-02-27 18 37 36" src="https://user-images.githubusercontent.com/67290662/109383882-d68cb680-792c-11eb-8e6b-8ba60bcabcfe.png">

<img width="1437" alt="スクリーンショット 2021-02-27 18 23 17" src="https://user-images.githubusercontent.com/67290662/109383888-de4c5b00-792c-11eb-97a8-7410cc5684fc.png">

<img width="1440" alt="スクリーンショット 2021-02-27 18 24 06" src="https://user-images.githubusercontent.com/67290662/109383897-e86e5980-792c-11eb-8c63-f6321ca5b0ae.png">

<img width="1440" alt="スクリーンショット 2021-02-27 18 36 01" src="https://user-images.githubusercontent.com/67290662/109383905-f2905800-792c-11eb-83a0-448f61ee3c4f.png">

<img width="1440" alt="スクリーンショット 2021-02-27 18 36 21" src="https://user-images.githubusercontent.com/67290662/109383908-f58b4880-792c-11eb-9c34-b0189ac8a43e.png">

<img width="1419" alt="スクリーンショット 2021-02-27 18 24 31" src="https://user-images.githubusercontent.com/67290662/109383913-fae89300-792c-11eb-93de-38fe5bda2639.png">

<img width="1440" alt="スクリーンショット 2021-02-27 18 24 49" src="https://user-images.githubusercontent.com/67290662/109383919-02a83780-792d-11eb-9af4-5e14bc85642f.png">

<img width="1435" alt="スクリーンショット 2021-02-27 18 26 06" src="https://user-images.githubusercontent.com/67290662/109383924-0c319f80-792d-11eb-895e-cf50a3f88f80.png">

<img width="1432" alt="スクリーンショット 2021-02-27 18 25 51" src="https://user-images.githubusercontent.com/67290662/109383932-12c01700-792d-11eb-99ae-baa8437289f7.png">

<img width="1433" alt="スクリーンショット 2021-02-27 18 26 40" src="https://user-images.githubusercontent.com/67290662/109383936-1784cb00-792d-11eb-910d-4818b6197a33.png">

<img width="1440" alt="スクリーンショット 2021-02-27 18 27 07" src="https://user-images.githubusercontent.com/67290662/109383939-1b185200-792d-11eb-869a-35e1d3fb787f.png">

<img width="1057" alt="スクリーンショット 2021-02-27 18 27 33" src="https://user-images.githubusercontent.com/67290662/109383941-1d7aac00-792d-11eb-870a-595a266c0068.png">

<img width="1431" alt="スクリーンショット 2021-02-27 18 33 14" src="https://user-images.githubusercontent.com/67290662/109383942-1f446f80-792d-11eb-9221-342818d75946.png">

<img width="1405" alt="スクリーンショット 2021-02-27 18 30 36" src="https://user-images.githubusercontent.com/67290662/109383944-223f6000-792d-11eb-8052-8687e428d06c.png">






## 使用技術

#### フロントエンド 
- Vue.js 2.6.11
- HTML/CSS/NDBootstrap
- 
#### バックエンド
- PHP 7.3.18
- Laravel 6.20.16
- 楽天booksAPI <https://webservice.rakuten.co.jp/api/booksbooksearch/>

#### インフラ
- Heroku


## 使用方法
1. ナビゲーションバーから書籍検索→虫眼鏡アイコンをクリック→フォームにキーワードを入力で書籍を検索。
2. 書籍のタイトルをクリックすると詳細画面へ→お気に入りボタンでお気に入り登録可能。
3. お気に入り登録した書籍はマイアカウントから見れる。
4. ユーザーアイコンの登録はGravatarで行う→<https://ja.gravatar.com/>

## アピールポイント
- Vue.jsを使用した非同期通信による無限スクロール
- 書籍お気に入り登録機能
- 星５段階評価機能
- 他ユーザーのお気に入り登録書籍、レビューを見れる機能
- 書籍詳細画面から楽天ブックスにあるその書籍の商品ページに飛べる


