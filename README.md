# Advent of Code

Personal solutions across a few years. Each year uses a different language - mostly an excuse to try something new, not to chase leaderboard times.

## Structure

```
.
├── 2022/c_lang/          # C, one folder per day
│   └── day_XX/
│       ├── main.c
│       └── N.input       # local only (gitignored)
├── 2024/typescript/
│   ├── package.json
│   └── src/
│       ├── index.ts      # runner
│       └── day_XX/
│           ├── index.ts
│           ├── input     # gitignored
│           └── test      # gitignored
└── 2025/php/
    ├── bin/run.php
    ├── composer.json
    └── src/
        ├── Runner.php
        ├── Solution.php
        └── day_XX/
            ├── index.php
            ├── input     # gitignored
            └── test      # gitignored
```

Puzzle inputs are not committed. Drop your own `input` / `test` files (or `N.input` for 2022) next to each day's code before running.

## Running

### 2024 — TypeScript

```bash
cd 2024/typescript
npm install
npm run build
npm start                          # all implemented days
npm start -- --day=07              # single day
npm run start:test -- --day=07     # test input
```

Each day exports a default function: `(input: string) => { p1, p2 }`.

### 2025 — PHP

```bash
cd 2025/php
composer install
composer aoc                       # all implemented days
composer aoc -- --day=02
composer aoc -- --test=true --day=02
```

Days live in `src/day_XX/index.php` and expose a `solve(string $input): Solution` function.

### 2022 — C

No shared runner. Compile and run from the day folder:

```bash
cd 2022/c_lang/day_01
gcc -o main main.c array.c
./main
```

Input file is `./1.input` (day number, not zero-padded). Day 1 also uses a small dynamic array helper (`array.c` / `array.h`).

## Progress

Links go to the puzzle descriptions on [adventofcode.com](https://adventofcode.com/). Only listing days with code here.

| Year | Day | Problem |
|------|-----|---------|
| 2022 | 01 | [Calorie Counting](https://adventofcode.com/2022/day/1) |
| 2022 | 02 | [Rock Paper Scissors](https://adventofcode.com/2022/day/2) |
| 2022 | 03 | [Rucksack Reorganization](https://adventofcode.com/2022/day/3) |
| 2022 | 04 | [Camp Cleanup](https://adventofcode.com/2022/day/4) |
| 2022 | 05 | [Supply Stacks](https://adventofcode.com/2022/day/5) |
| 2022 | 06 | [Tuning the Signal](https://adventofcode.com/2022/day/6) |
| 2022 | 07 | [No Space Left On Device](https://adventofcode.com/2022/day/7) |
| 2022 | 08 | [Treetop Tree House](https://adventofcode.com/2022/day/8) |
| 2022 | 09 | [Rope Bridge](https://adventofcode.com/2022/day/9) |
| 2024 | 01 | [Historian Hysteria](https://adventofcode.com/2024/day/1) |
| 2024 | 02 | [Red-Nosed Reports](https://adventofcode.com/2024/day/2) |
| 2024 | 03 | [Mull It Over](https://adventofcode.com/2024/day/3) |
| 2024 | 04 | [Ceres Search](https://adventofcode.com/2024/day/4) |
| 2024 | 05 | [Print Queue](https://adventofcode.com/2024/day/5) |
| 2024 | 06 | [Guard Gallivant](https://adventofcode.com/2024/day/6) |
| 2024 | 07 | [Bridge Repair](https://adventofcode.com/2024/day/7) |
| 2024 | 08 | [Resonant Collinearity](https://adventofcode.com/2024/day/8) |
| 2024 | 09 | [Disk Fragmenter](https://adventofcode.com/2024/day/9) |
| 2024 | 10 | [Hoof It](https://adventofcode.com/2024/day/10) |
| 2024 | 11 | [Plutonian Pebbles](https://adventofcode.com/2024/day/11) |
| 2024 | 12 | [Garden Groups](https://adventofcode.com/2024/day/12) |
| 2024 | 13 | [Claw Contraption](https://adventofcode.com/2024/day/13) |
| 2024 | 14 | [Restroom Redoubt](https://adventofcode.com/2024/day/14) |
| 2024 | 15 | [Warehouse Woes](https://adventofcode.com/2024/day/15) |
| 2024 | 16 | [Reindeer Maze](https://adventofcode.com/2024/day/16) |
| 2024 | 17 | [Chronospatial Computer](https://adventofcode.com/2024/day/17) |
| 2025 | 01 | [Secret Entrance](https://adventofcode.com/2025/day/1) |
| 2025 | 02 | [Gift Shop](https://adventofcode.com/2025/day/2) |
| 2025 | 03 | [Lobby](https://adventofcode.com/2025/day/3) |
