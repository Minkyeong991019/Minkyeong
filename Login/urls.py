from django.contrib import admin
from django.urls import path, include
from . import views


urlpatterns = [
    path('', views.login),
    path('forgotpassword',views.forgotpassword),
    path('Register', views.Register),
    path('CheckAccount', views.loginManager),
    path('RegisterAcount', views.RegisterAcount),    

]