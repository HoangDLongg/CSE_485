//Lap trinh nhap mot chuoi ki tu tu ban phim
//Dem xem ki tu dau tien cua chuoi xuat hien bao nhieu lan
#include<iostream>
#include<string>
using namespace std;
int main(){
	string s;
	cout<<"Nhap chuoi: "; getline(cin, s);
	if(s.size() == 0){
		cout<<"Chuoi rong!";
	}
	int count = 0;
	char firstchar = s[0];
	for(int i = 0; i < s.size(); i++){
		if(s[i] == firstchar){
			count++;
		}
	}
	cout<<"Ki tu dau tien trong chuoi xuat hien "<<count<<" lan";
}
