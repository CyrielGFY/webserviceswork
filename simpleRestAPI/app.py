# Dependency imports
from flask import Flask, request


# Flask server creation
MY_APP = Flask(__name__)

# default route definition
@MY_APP.route('/', methods=['GET', 'POST'])
def root():
    if request.method == 'GET':
        return 'coucou'
    else:
        return f'Bonjour {request.get_json()["name"]}'


# App entry point
if __name__ == '__main__':
    MY_APP.run('0.0.0.0', 8080, debug=True)
