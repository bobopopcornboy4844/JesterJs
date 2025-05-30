function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    return xmlHttp.responseText;
}

function assemble(assemblyFilename, outputFilename) {
    const assemblyFile = httpGet("http://jesterjs.servehttp.com/BatPU/"+assemblyFilename);
    const machineCodeFile = "";
    const lines = assemblyFile.split('\n').map(line => line.trim());

    function removeComment(commentSymbol, line) {
        return line.split(commentSymbol)[0];
    }

    // remove comments and blank lines
    lines = lines.map(line => removeComment("/", line));
    lines = lines.filter(line => line.trim());

    // create symbols
    const symbols = {
        'input': 0,
        'b_right': 1,
        'b_up': 2,
        'b_down': 4,
        'b_left': 8,
        'p_right': 16,
        'p_up': 32,
        'p_down': 64,
        'p_left': 128,
        'screen_opcode': 60,
        'noop': 0,
        'plot_pixel': 1,
        'delete_pixel': 2,
        'fill_screen': 4,
        'clear_screen': 8,
        'screen_x': 61,
        'screen_y': 62,
        'number_display': 63
    };

    const registers = ['r0', 'r1', 'r2', 'r3', 'r4', 'r5', 'r6', 'r7'];
    registers.forEach((symbol, index) => {
        symbols[symbol] = index;
    });

    const opcodes = ['nop', 'hlt', 'add', 'sub', 'orr', 'nor', 'and', 'xor', 'inc', 'dec', 'rsh', 'ldi', 'lod', 'str', 'jmp', 'bif'];
    opcodes.forEach((symbol, index) => {
        symbols[symbol] = index;
    });

    const flags = ['zero', 'msb'];
    flags.forEach((symbol, index) => {
        symbols[symbol] = index;
    });

    function isDefinition(word) {
        return word === 'define';
    }

    function isLabel(word) {
        return word[0] === '.';
    }

    // add definitions and labels to symbol table
    // expects all definitions to be above assembly
    let offset = 0;
    lines.forEach((line, index) => {
        const words = line.split(' ');
        if (isDefinition(words[0])) {
            symbols[words[1]] = parseInt(words[2]);
            offset += 1;
        } else if (isLabel(words[0])) {
            symbols[words[0]] = index - offset;
        }
    });

    // generate machine code
    function resolve(word) {
        if (word[0] === '#') {
            return parseInt(word.slice(1));
        }
        return symbols[word];
    }

    for (let i = offset; i < lines.length; i++) {
        let line = lines[i];
        let words = line.split(' ');

        // remove label, we have it in symbols now
        if (isLabel(words[0])) {
            words = words.slice(1);
        }

        // special ops
        if (words[0] === 'lsh') {
            words = ['add', words[1], words[2], words[2]];
        } else if (words[0] === 'cmp') {
            words = ['sub', registers[0], words[1], words[2]];
        } else if (words[0] === 'cpy') {
            words = ['add', words[1], words[2], registers[0]];
        } else if (words[0] === 'not') {
            words = ['nor', words[1], words[2], registers[0]];
        }

        // begin machine code translation
        const opcode = words[0];
        let machineCode = (symbols[opcode] << 12);
        words = words.map(word => resolve(word));

        if (['add', 'sub', 'orr', 'nor', 'and', 'xor', 'inc', 'dec', 'rsh', 'ldi', 'lod'].includes(opcode)) { // Reg Dest
            machineCode |= (words[1] << 9);
        }

        if (['add', 'sub', 'orr', 'nor', 'and', 'xor', 'inc', 'dec', 'rsh'].includes(opcode)) { // Reg A
            machineCode |= (words[2] << 3);
        } else if (opcode === 'str') {
            machineCode |= (words[1] << 3);
        }

        if (['add', 'sub', 'orr', 'nor', 'and', 'xor'].includes(opcode)) { // Reg B
            machineCode |= words[3];
        }

        if (opcode === 'ldi') { // Immediate
            machineCode |= words[2];
        }

        if (opcode === 'jmp') { // Address and Flag
            machineCode |= words[1];
        } else if (opcode === 'bif') {
            machineCode |= (words[1] << 6);
            machineCode |= words[2];
        }

        const asString = machineCode.toString(2).padStart(16, '0');
        machineCodeFile += `${asString}\n`;
    }

    return machineCodeFile;
}