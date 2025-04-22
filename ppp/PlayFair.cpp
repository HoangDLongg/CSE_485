#include<iostream>
using namespace std;
int main(){
	string A = "ABCDEFGHIKLMNOPQRSTUVWXYZ";
	string K;
	cout<<"Nhap chuoi khoa K: "; getline(cin, K);
	//Thuat toan xoa phan tu trung lap, dien them vao chuoi tren nhung ki tu cn lai trong bang chu cai
	K = K + A;
	for(int i = 0; i < K.size(); i++){
		for(int j = i + 1; j<K.size(); j++){
			if(K[j] == K[i]){
				K.erase(j, 1);
				j--;
			}
		}
	}
	cout<<"Chuoi day du: "<<K<<endl;
	
	//Dat chuoi thu duoc vao ma tran khoa 5x5
	char B[5][5];
	int index = 0;
	for(int i = 0; i < 5 ; i++){
		for(int j = 0; j < 5; j++){
			B[i][j] = K[index];
			index++;
		}
	}
	for(int i = 0; i < 5; i++){
		for(int j = 0; j < 5; j++){
			cout<<B[i][j]<<" ";
		}
		cout<<endl;
	}
	
	//Plaintext -> Ciphertext
	String P, C;
	cout<<"Nhap chuoi Plaintext: "; getline(cin, P);
	//Tach chuoi ki tu
	
}
