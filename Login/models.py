from django.db import models
from django.contrib.auth.models import AbstractUser
# Create your models here.
class User(AbstractUser):
	Sex = ((0,"Male"),(1,"Female"),(2,"Other"))
	DOB = models.DateTimeField(blank = True, null = True)
	PhoneNumber = models.IntegerField(blank=True, null = True)
	username = models.CharField(max_length = 12, null = True, blank = True,unique=True)
	Address = models.CharField(max_length = 60, null = True, blank = True,)
# Create your models here.
