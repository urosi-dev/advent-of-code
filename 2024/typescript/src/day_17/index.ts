import { Solution } from "@/index";

const r = new Map<string, number>();

function combo(o: number) {
  switch (o) {
    case 0:
    case 1:
    case 2:
    case 3:
      return o;
    case 4:
      return r.get("A")!;
    case 5:
      return r.get("B")!;
    case 6:
      return r.get("C")!;
    default:
      throw new Error("Unexpected combo operand: " + o);
  }
}

const dv = (o: number, g: string) => r.set(g, r.get("A")! >> combo(o));

type Instruction = 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7;
const instructionF = {
  0: (o: number) => {
    dv(o, "A");
  },
  1: (o: number) => {
    r.set("B", r.get("B")! ^ o);
  },
  2: (o: number) => {
    r.set("B", combo(o) % 8);
  },
  3: (o: number) => (r.get("A") === 0 ? undefined : o),
  4: (_: number) => {
    r.set("B", r.get("B")! ^ r.get("C")!);
  },
  5: (o: number) => combo(o) % 8,
  6: (o: number) => {
    dv(o, "B");
  },
  7: (o: number) => {
    dv(o, "C");
  },
};

function main(f: string): Solution {
  let p1 = "";
  let p2 = 0;

  const input = f.split("\n");
  const len = input.length;

  let instructions: string[] = [];

  for (let i = 0; i < len; i++) {
    const line = input[i];
    if (line[0] === "R") r.set(line[9], Number(line.split(" ")[2]));
    if (line[0] === "P") instructions = line.split(" ")[1].split(",");
  }

  let ip = 0;
  const il = instructions.length;

  while (ip < il) {
    const instruction = Number(instructions[ip]);
    const operand = Number(instructions[ip + 1]);

    const op = instructionF[instruction as Instruction](operand);

    if (instruction === 5) {
      p1 += op;
    }

    if (instruction === 3 && op !== undefined) {
      ip = op;
      if (ip === -1)
        throw new Error(
          `instruction with code ${op} not found\n instruction: ${instruction}, operand: ${operand}`,
        );
    } else {
      ip += 2;
    }
  }

  p1 = p1.split("").join(",");

  return { p1, p2 };
}

export default main;
