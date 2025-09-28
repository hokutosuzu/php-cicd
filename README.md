## 開発支援ツール

### PHP CS fixer
#### 　使用方法

コード整形チェック

`docker compose exec php composer cs-check`

自動整形

`docker compose exec php composer cs-fix`
  - ファイル指定: `docker compose exec php vendor/bin/php-cs-fixer fix app/Models/User.php`
  - ディレクトリ指定: `docker compose exec php vendor/bin/php-cs-fixer fix app/Http/Controllers`

#### 設定ファイル

.php-cs-fixer.dist.php

#### 設定内容
Finder 設定

- 対象ディレクトリ: app / config / database / routes / tests を走査し、実装コードとテストを整形対象に含めます。
- 除外設定: bootstrap storage vendor を除外し、ビルド成果物や外部ライブラリを触らないようにしています。
- 拡張子条件: *.php のみ対象、Blade テンプレートなど *.blade.php は除外。

Config 設定

- リスキー許可: setRiskyAllowed(true) で動作に副作用があり得るルールも適用可能にしています（今回のルールは安全域）。
- ルール基本: @PSR12 を基盤にし、Laravel で一般的なスタイルへ細かい調整を追加。
- インデント幅: setIndent('  ') で PHP コードを2スペースに統一。

個別ルール

- array_syntax: ['syntax' => 'short'] 短配列構文 ([]) を強制。
- array_indentation: true で多行配列の各要素を1段（2スペース）だけ深く整列。
- binary_operator_spaces: align_single_space_minimal で演算子周りを揃えて可読性向上。
- blank_line_before_statement: return 前に空行を挿入。
- concat_space: 文字列結合に 1 スペースを入れて読みやすく。
- no_unused_imports: 未使用 use 文を削除。
- not_operator_with_successor_space: ! の直後にスペースを挿入。
- ordered_imports: アルファベット順で use を整理。
- phpdoc_align: PHPDoc の型などを左揃え。
- phpdoc_scalar: integer→int などスカラ型を統一。
- phpdoc_summary: 1 行サマリを強制しない設定。
- single_quote: 変数展開が不要な文字列を ' に統一。
- trailing_comma_in_multiline: 複数行配列の末尾にカンマを残し diff を最小化。
