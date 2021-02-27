# FavoBook

#### 書籍のお気に入り登録と評価（レビュー）ができるアプリです。
#### herokuURL→https://favo-book.herokuapp.com/

# アプリ概要
- 私自身本が好きで、本の検索やコメント、評価ができ、また他人のレビューも見れてそのユーザーをフォローして繋がれるようなサイトがあれば良いなと思い作成しました。

# 今後の展望
- UI/UXの部分に関してはいまいちだと思っており、これから改善して行けたら良いと思います。特にアカウント詳細画面の部分のところを改善していきたいと思っております。
- 現時点ではレンタルサーバーであるherokuにデプロイして動かしているのですが、将来的にはAWS上で動かせたらなと思っております。
- 現時点では最低限動かせるといった状態なので、これからさらに改良を重ねていきたいと思っております。


# 使用技術

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


