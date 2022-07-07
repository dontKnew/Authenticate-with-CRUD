<?php

namespace App\Controllers;
use App\Models\MemberModel;
use CodeIgniter\HTTP\IncomingRequest;

class Home extends BaseController
{
    public function index()
    {
        $memberModel = new MemberModel();

        // $members = $memberModel->orderBy('id','DESC')->findAll();
        if(isset($_GET['page'])){
            $cPage = $_GET['page'];
        }else {
            $cPage = 1;
        }
        $data = [
            'members' => $memberModel->orderBy('id','DESC')->paginate(5),
            'pager' => $memberModel->pager,
            'currentPage'=> $cPage,
        ];
        return view('members', $data);
    }
    public function addMember()
    {
        if ($this->request->getMethod() == "post") {

            $rules = [
                "name" => "required|min_length[3]|max_length[40]",
                "email" => "required|valid_email",
                "mobile" => "required|min_length[9]|max_length[15]",
            ];

            if (!$this->validate($rules)) {

                return view('add-member', [
                    "validation" => $this->validator,
                ]);
            } else {

                $memberModel = new MemberModel();

                $data = [
                    'name' => $this->request->getVar("name"),
                    'email' => $this->request->getVar("email"),
                    'mobile' => $this->request->getVar("mobile"),
                ];
                $memberModel->save($data);

                $session = session();
                $session->setFlashdata("success", $this->request->getVar("name")." Member added successfully");
                return redirect()->to(base_url('/'), );
            }
        }
        return view('add-member');
    }

    public function editMember($id = null)
    {
        $memberModel = new MemberModel();
        $member = $memberModel->where("id", $id)->first();
        if($member){
            if ($this->request->getMethod() == "post") {

                $rules = [
                    "name" => "required|min_length[3]|max_length[40]",
                    "email" => "required|valid_email",
                    "mobile" => "required|min_length[9]|max_length[15]",
                ];
    
                if (!$this->validate($rules)) {
                    return view('edit-member', [
                        "validation" => $this->validator,
                        "member" => $member,
                    ]);
                    
                } else {
    
                    $data = [
                        'name' => $this->request->getVar("name"),
                        'email' => $this->request->getVar("email"),
                        'mobile' => $this->request->getVar("mobile"),
                    ];
    
                    $memberModel->update($id, $data);
    
                    $session = session();
                    $session->setFlashdata("success", $this->request->getVar("name")." Member updated");
                    return redirect()->to(base_url('/'));
                }
            }
            return view('edit-member', [
                "member" => $member,
            ]);
        }else {
            return view('errors/html/production');
        }
    }

    public function deleteMember($id = null)
    {
        $memberModel = new MemberModel();
        $member = $memberModel->delete($id);

        // $session = session();
        // $session->setFlashdata("success", "Member deleted successfully");
        return $this->response->setJSON(['status'=>'Member deleted successfully']);

        // return redirect()->to(base_url('/'));
    }

    public function clearMembers()
    {
        $memberModel = new MemberModel();
        $session = session();
        try {
            $member = $memberModel->delete();
            $session->setFlashdata("success", "All Members Data has been Clear");
            return redirect()->to(base_url('/'));
        } catch (\Exception $e){
            $session->setFlashdata("success", $e);
        }
    }

    public function example() {
        return view('comments');
    }
}
