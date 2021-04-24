from django.contrib import admin
from django.urls import path, include
from . import views

urlpatterns = [
    path('', views.Home),
    path('about', views.about),
    path('Contact', views.Contact),
    path('Booking', views.booking ),
    path('RegisterInformation', views.RegisterInformation),
    path('logout', views.logout),
    path('addbooking',views.addbooking),


]