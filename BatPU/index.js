function Nprint(txt) {
  document.getElementById("list").innerHTML += '<div>'+txt+'</div>';
}

function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    return xmlHttp.responseText;
}

function simulate(machinecode_filename, debug = true) {
  const opcode_labels = {
    0: 'nop',
    1: 'hlt',
    2: 'add',
    3: 'sub',
    4: 'orr',
    5: 'nor',
    6: 'and',
    7: 'xor',
    8: 'inc',
    9: 'dec',
    10: 'rsh',
    11: 'ldi',
    12: 'lod',
    13: 'str',
    14: 'jmp',
    15: 'bif'
  };

  const NUM_REGS = 8;
  const NUM_FLAGS = 2;
  const DATA_SIZE = 2 ** 6;
  const PROGRAM_SIZE = 2 ** 6;

  let registers = new Array(NUM_REGS).fill(0);
  registers[NUM_REGS - 1] = 1;
  let flags = new Array(NUM_FLAGS).fill(false);
  let data_memory = new Array(DATA_SIZE).fill(0);
  let program_memory = new Array(PROGRAM_SIZE).fill(0);
  let pc = 0;

  const file = httpGet(machinecode_filename);
  const lines = file.split("\n");

  lines.forEach((value, index) => {
    program_memory[index] = parseInt(value, 2);
  });

  let running = true;
  let cycles = 0;

  const screen_size = 8;
  let screen = Array.from({ length: screen_size }, () => new Array(screen_size).fill(0));

  while (running) {
    registers[0] = 0;

    let instruction = program_memory[pc];

    let opcode = instruction >> 12;
    let regDest = (instruction >> 9) & 7;
    let regA = (instruction >> 3) & 7;
    let regB = instruction & 7;
    let immediate = instruction & 255;
    let address = instruction & 63;
    let flag = (instruction >> 6) & 1;

    opcode = opcode_labels[opcode];
    switch (opcode) {
      case 'hlt':
        running = false;
        break;
      case 'add':
        registers[regDest] = registers[regA] + registers[regB];
        break;
      case 'sub':
        registers[regDest] = registers[regA] - registers[regB];
        break;
      case 'orr':
        registers[regDest] = registers[regA] | registers[regB];
        break;
      case 'nor':
        registers[regDest] = ~(registers[regA] | registers[regB]);
        break;
      case 'and':
        registers[regDest] = registers[regA] & registers[regB];
        break;
      case 'xor':
        registers[regDest] = registers[regA] ^ registers[regB];
        break;
      case 'inc':
        registers[regDest] = registers[regA] + 1;
        break;
      case 'dec':
        registers[regDest] = registers[regA] - 1;
        break;
      case 'rsh':
        registers[regDest] = registers[regA] >> 1;
        break;
      case 'ldi':
        registers[regDest] = immediate;
        break;
      case 'lod':
        registers[regDest] = data_memory[registers[7]];
        break;
      case 'str':
        data_memory[registers[7]] = registers[regA];
        break;
      case 'jmp':
        pc = address;
        break;
      case 'bif':
        pc = flags[flag] ? address : pc + 1;
        break;
    }

    if (!['jmp', 'bif'].includes(opcode)) {
      pc += 1;
    }

    cycles += 1;

    if (['add', 'sub', 'orr', 'nor', 'and', 'xor', 'inc', 'dec', 'rsh'].includes(opcode)) {
      flags[0] = registers[regDest] === 0;
      registers[0] = 0;
      flags[1] = registers[regA] < registers[regB];
    }

    let number_display = data_memory[63];
    let screen_y = data_memory[62];
    let screen_x = data_memory[61];
    let screen_opcode = data_memory[60];

    switch (screen_opcode) {
      case 1: // plot pixel
        screen[screen_y][screen_x] = 1;
        break;
      case 2: // delete pixel
        screen[screen_y][screen_x] = 0;
        break;
      case 4: // fill screen
        screen = Array.from({ length: screen_size }, () => new Array(screen_size).fill(1));
        break;
      case 8: // clear screen
        screen = Array.from({ length: screen_size }, () => new Array(screen_size).fill(0));
        break;
    }

    if (debug) {
      Nprint(`Cycle #${cycles}:`);
      Nprint(`Instruction: ${opcode}`);
      Nprint('----------------');
      registers.forEach((value, index) => {
        Nprint(`Register ${index}: ${value}`);
      });
      Nprint(`Flag Zero: ${flags[0]}`);
      Nprint(`Flag MSB: ${flags[1]}`);
      Nprint(`Data Memory: ${data_memory}`);
    }

    Nprint(`NUMBER DISPLAY: ${number_display}`);
    Nprint('SCREEN:');
    for (let row of screen.reverse()) {
      Nprint(row);
    }
    Nprint();
  }
}
simulate("http://jesterjs.servehttp.com/BatPU/asm.txt",true);