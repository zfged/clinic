import axios from "axios";
export const userService = {
    login,
    logout,
    users
};

function login(email, password) {
    const requestOptions = {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email , password  })
    };

    return fetch(`http://127.0.0.1:8000/api/login`, requestOptions)
        .then(handleResponse)
        .then(user => {
            // login successful if there's a jwt token in the response
            if (user.token) {
                // store user details and jwt token in local storage to keep user logged in between page refreshes
                localStorage.setItem('user', JSON.stringify(user));
            }

            return user;
        });
}

function logout() {
    // remove user from local storage to log user out
    localStorage.removeItem('user');
}

function handleResponse(response) {
    return response.text().then(text => {
        const data = text && JSON.parse(text);
        if (!response.ok) {
            if (response.status === 401) {
                // auto logout if 401 response returned from api
                logout();
                location.reload(true);
            }

            const error = (data && data.message) || response.statusText;
            return Promise.reject(error);
        }

        return data;
    });
}

async function users(){
    const commonUsers = []
    const res1 = await axios.get('http://localhost:8000/api/user1')
    const res2 = await axios.get('http://localhost:8000/api/user2')
    const res3 = await axios.get('http://localhost:8000/api/user3')

    commonUsers.push(...res1.data.data,...res2.data.data,...res3.data.data)

    return commonUsers
}

