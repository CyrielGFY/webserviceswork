/**
 * A polite App...
 *
 * Based on the <field> value and triggered by the <button>.
 * The code below provides two methods to send the same query
 * with different HTTP methods (POST & GET).
 * In the first case, server should namely welcome you,
 * in the second case, it will simply say "coucou".
 *
 * Disclaimer:
 *      Following code structure is terrible:
 *      we should use the Axios object that allow
 *      HTTP method to be defined dynamically and only use one method:
 *      axios({
 *          method: 'YOUR METHOD',
 *          url: '/',
 *          data: {...}
 *      }
 */


// DOMNodes shortcuts definition:
const field = document.getElementById('field');
const button = document.getElementById('button');


// Send as POST method to be namely welcomed
function send() {
    axios.post('http://localhost:8080', {"name": field.value})
        .then((response) => {
            // Full response object print
            console.log(response);
            // Response data print
            alert(response.data);
        })
        .catch((error) => {
            // In case of error, just put it to the error thread
            console.error(error);
        })
}


// Send as get to be anonymously welcomed
function sendGet() {
    axios.post('http://localhost:8080', {"name": field.value})
        .then((response) => {
            // Full response object print
            console.log(response);
            // Response data print
            alert(response.data);
        })
        .catch((error) => {
            // In case of error, just put it to the error thread
            console.error(error);
        })
}