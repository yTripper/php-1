let resetInput = false;
let lastResult = 0;

function priority(operation) {
    if (operation == '+' || operation == '-') {
        return 1;
    } else {
        return 2;
    }
}

function isNumeric(str) {
    return /^\d+(.\d+){0,1}$/.test(str);
}

function isDigit(str) {
    return /^\d{1}$/.test(str);
}

function isOperation(str) {
    return /^[\+\-\*\/]{1}$/.test(str);
}

function tokenize(str) {
    let tokens = [];
    let lastNumber = '';
    for (char of str) {
        if (isDigit(char) || char == '.') {
            lastNumber += char;
        } else {
            if (lastNumber.length > 0) {
                tokens.push(lastNumber);
                lastNumber = '';
            }
        }
        if (isOperation(char) || char == '(' || char == ')') {
            tokens.push(char);
        }
    }
    if (lastNumber.length > 0) {
        tokens.push(lastNumber);
    }
    return tokens;
}

function compile(str) {
    let out = [];
    let stack = [];
    for (token of tokenize(str)) {
        if (isNumeric(token)) {
            out.push(token);
        } else if (isOperation(token)) {
            while (stack.length > 0 &&
                isOperation(stack[stack.length - 1]) &&
                priority(stack[stack.length - 1]) >= priority(token)) {
                out.push(stack.pop());
            }
            stack.push(token);
        } else if (token == '(') {
            stack.push(token);
        } else if (token == ')') {
            while (stack.length > 0 && stack[stack.length - 1] != '(') {
                out.push(stack.pop());
            }
            stack.pop();
        }
    }
    while (stack.length > 0) {
        out.push(stack.pop());
    }
    return out.join(' ');
}

function evaluate(str) {
    const stack = [];

    const tokens = str.split(' ');

    for (const token of tokens) {
        if (isNumeric(token)) {
            stack.push(parseFloat(token));
        } else if (isOperation(token)) {
            const operand2 = stack.pop();
            const operand1 = stack.pop();

            switch (token) {
                case '+':
                    stack.push(operand1 + operand2);
                    break;
                case '-':
                    stack.push(operand1 - operand2);
                    break;
                case '*':
                    stack.push(operand1 * operand2);
                    break;
                case '/':
                    stack.push(operand1 / operand2);
                    break;
            }
        }
    }

    return stack[0];
}

function clickHandler(event) {
    const screen = document.querySelector('.screen span');
    const clickedButton = event.target.closest('.key');

    if (clickedButton) {
        const buttonText = clickedButton.textContent;

        if (buttonText === '=') {
            const expression = screen.textContent.trim();
            const result = evaluate(compile(expression));
            lastResult = result;
            screen.textContent = result.toFixed(2);
            resetInput = true;
            document.getElementById('expressionInput').value = expression;
            document.getElementById('calcForm').submit();
        } else if (buttonText === 'C') {
            screen.textContent = '';
            resetInput = false;
        } else {
            if (resetInput) {
                if (isNumeric(buttonText)) {
                    screen.textContent = buttonText;
                } else {
                    screen.textContent = lastResult + buttonText;
                }
                resetInput = false;
            } else {
                screen.textContent += buttonText;
            }
        }
    }
}

window.onload = function () {
    const buttonsContainer = document.querySelector('.buttons');
    buttonsContainer.addEventListener('click', clickHandler);
};
