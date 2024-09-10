/**
 * Function to validate input based on allowed characters.
 * @param {string} input - The input value to validate.
 * @returns {boolean} - Returns true if the input is valid, false otherwise.
 */
function isValidInput(input) {
    const phonePattern = /^\+?\d[\d\s\-()]{7,}$/;
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (phonePattern.test(input) || emailPattern.test(input)) {
        return true; // Valid input
    }
    const generalPattern = /^[a-zA-Z0-9\s\-.,()'"]+$/;
    return generalPattern.test(input);
  }
  export { isValidInput };



// Function to validate the month
export function isValidMonth(month) {
    const validMonths = [
        'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec', // Abbreviated
        'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december' // Full
    ];
    return validMonths.includes(month.toLowerCase());
}