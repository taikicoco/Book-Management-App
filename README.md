# 書籍管理アプリ

## 概要

- 主な機能：書籍の情報登録・ログイン認証機能・貸出状態の管理

## 使用した技術
- 主な言語：PHP,Laravel
- 使用したAPI：[楽天books](https://webservice.rakuten.co.jp/explorer/api/BooksBook/Search)

## 工夫・改善した点
- APIを使用して書籍の情報登録を簡易かした点
- 貸出履歴を確認出来るように本の情報tabbleと別にリレーショテーブルを作成した点
- 動作に関するメッセージを表示し、Userがアプリの動作を把握できるようにした点
