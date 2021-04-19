from django.shortcuts import render
from django.contrib.auth import authenticate
from .models import User
from django.db import connection
from django.shortcuts import redirect


# Create your views here.
def login(request):
	return render(request, 'login.html')

def forgotpassword(request):
	return render(request, 'forgotpassword.html')

def Register(request):
	return render(request, 'Register.html')
def loginManager(request):
    if request.method == 'POST':
        userName = request.POST.get('userName','')
        passWord = request.POST.get('passWord','')
        user = authenticate(username=userName, password=passWord)
        if(user is not None):
            userID =  User.objects.filter(username = userName)[0].id
            print(userID)
            with connection.cursor() as cursor:
                cursor.execute(
                    "SELECT auth_group.name FROM auth_group INNER JOIN login_user_groups ON auth_group.id = login_user_groups.group_id INNER JOIN login_user ON login_user.id = login_user_groups.user_id WHERE login_user.id = '%s'" ,
                [userID]
                )
                auth_group = cursor.fetchall()[0][0]
            if(auth_group == "Manager"):
                return redirect('/Manager/')
            elif(auth_group == "Guest"):
                return redirect('/')
        else:
            error = {'error': 'Username or password is incorrect !'}
            return render(request, 'login.html', error)
    else:
        if request.user.is_authenticated:
            return redirect('/')
        else:
            return render(request, 'login.html')